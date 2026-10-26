<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Uploaded data is bigger than PHP's post_max_size: PHP drops the whole form,
        // so send the user back with a readable message instead of a bare 413 page.
        $this->renderable(function (PostTooLargeException $e, $request) {
            Log::warning('Upload rejected: request is larger than post_max_size', [
                'url' => $request->fullUrl(),
                'user_id' => optional($request->user())->id,
                'content_length' => $request->server('CONTENT_LENGTH'),
                'post_max_size' => ini_get('post_max_size'),
            ]);

            return redirect()->back()->with(
                'error',
                'حجم الملف المرفوع أكبر من الحد المسموح به على الخادم (' . ini_get('post_max_size') . '). يرجى رفع ملف أصغر.'
            );
        });

        // The form's CSRF token expired (page left open longer than the session lifetime).
        $this->renderable(function (TokenMismatchException $e, $request) {
            Log::warning('Form rejected: CSRF token expired or missing', [
                'url' => $request->fullUrl(),
                'user_id' => optional($request->user())->id,
            ]);

            return redirect()->back()->withInput($request->except(['_token', 'password', 'file', 'excel_file']))->with(
                'error',
                'انتهت صلاحية الصفحة بسبب عدم النشاط. تم تحديث الصفحة، يرجى إعادة إرسال النموذج.'
            );
        });

        // Database is unreachable or a query failed: show a readable message on normal pages.
        $this->renderable(function (QueryException $e, $request) {
            if (config('app.debug') || $request->expectsJson()) {
                return null;
            }

            return response()->view('errors.database', [], 500);
        });
    }
}
