<?php

namespace App\Http\Requests\Researches;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreResearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => 'nullable|integer|min:1|unique:researches,id',
            "title" => 'required|string|max:255|unique:researches,title',
            "researcher" => 'required|string|max:255',
            "number_of_pages" => 'required|integer|min:1',
            "date" => 'required|date',
            "file" => 'nullable|file|mimes:pdf|max:102400', // Max 100MB
        ];
    }

    public function messages()
    {
        return [
            "id.integer" => 'الرقم يجب أن يكون رقماً صحيحاً',
            "id.min" => 'الرقم يجب أن يكون أكبر من صفر',
            "id.unique" => 'الرقم مستخدم لبحث آخر، اتركه فارغاً ليتم تعيينه تلقائياً أو اختر رقماً آخر',
            "title.required" => 'عنوان البحث مطلوب',
            "title.max" => 'عنوان البحث يجب ألا يتجاوز 255 حرفاً',
            "title.unique" => 'عنوان البحث موجود مسبقا',
            "researcher.required" => 'إسم الباحث مطلوب',
            "researcher.max" => 'إسم الباحث يجب ألا يتجاوز 255 حرفاً',
            "number_of_pages.required" => 'عدد الصفحات مطلوب',
            "number_of_pages.integer" => 'عدد الصفحات يجب أن يكون رقماً صحيحاً',
            "number_of_pages.min" => 'عدد الصفحات يجب أن يكون أكبر من صفر',
            "date.required" => 'تاريخ النشر مطلوب',
            "date.date" => 'تاريخ النشر غير صحيح',
            "file.file" => 'فشل رفع الملف، قد يكون حجمه أكبر من المسموح به على الخادم (' . ini_get('upload_max_filesize') . ')',
            "file.uploaded" => 'فشل رفع الملف، قد يكون حجمه أكبر من المسموح به على الخادم (' . ini_get('upload_max_filesize') . ')',
            "file.mimes" => 'ملف البحث يجب أن يكون بصيغة PDF',
            "file.max" => 'حجم ملف البحث يجب ألا يتجاوز 100 ميجابايت',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Log::info('Research create rejected by validation', [
            'user_id' => optional($this->user())->id,
            'title' => $this->input('title'),
            'errors' => $validator->errors()->all(),
        ]);

        parent::failedValidation($validator);
    }
}
