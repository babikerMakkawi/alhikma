<?php

use App\Http\Controllers\ResearchesController;
use App\Http\Controllers\ResearchIndexController;
use App\Http\Controllers\SnapshotsController;
use App\Models\Researches\Research;
use App\Models\Researches\ResearchIndex;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('index');
})->name("homepage");


Route::get('/R1.htm', function () {
    return redirect()->route("homepage");
});

Route::get('sending-researches', function () {
    return view('sending-researches');
});

Route::get('series-version', function () {
    return view('series-version');
});

Route::get('magazine-Introduction', function () {
    return view('magazine-Introduction');
});

Route::get('editor-in-chief', function () {
    return view('editor-in-chief');
});

Route::get('electronic-publishing', function (Request $request) {
    $query = Research::query();

    // Only these columns may be searched or sorted (prevents invalid/unsafe column names)
    $allowedSortFields = ['id', 'title', 'researcher', 'number_of_pages', 'date', 'created_at'];

    // Handle search
    if ($request->filled('search') && in_array($request->sort_by, $allowedSortFields)) {
        $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
    } elseif ($request->filled('search')) {
        // If search exists but no sort_by, search in all relevant fields
        $query = $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('researcher', 'like', '%' . $request->search . '%')
                ->orWhere('number_of_pages', 'like', '%' . $request->search . '%');
        });
    }

    // Handle sorting
    $sortBy = $request->input('sort_by', 'id'); // Default sort by id
    $sortOrder = $request->input('sort_order', 'desc'); // Default descending

    if (!in_array($sortBy, $allowedSortFields)) {
        $sortBy = 'id';
    }

    // Validate sort_order
    $sortOrder = strtolower($sortOrder) === 'asc' ? 'asc' : 'desc';

    $query = $query->orderBy($sortBy, $sortOrder);

    $researches = $query->paginate(10)->appends($request->query());

    return view('electronic-publishing', compact('researches'));
})->name('electronic-publishing');

Route::get('magazine-index', function (Request $request) {
    $query = ResearchIndex::query();

    // Only these columns may be searched or sorted (prevents invalid/unsafe column names)
    $allowedSortFields = ['id', 'subject', 'title', 'researcher', 'number', 'created_at'];

    // Handle search
    if ($request->filled('search') && in_array($request->sort_by, $allowedSortFields)) {
        $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
    } elseif ($request->filled('search')) {
        // If search exists but no sort_by, search in all relevant fields
        $query = $query->where(function ($q) use ($request) {
            $q->where('subject', 'like', '%' . $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search . '%')
                ->orWhere('researcher', 'like', '%' . $request->search . '%')
                ->orWhere('number', 'like', '%' . $request->search . '%');
        });
    }

    // Handle sorting
    $sortBy = $request->input('sort_by', 'id'); // Default sort by id
    $sortOrder = $request->input('sort_order', 'desc'); // Default descending

    if (!in_array($sortBy, $allowedSortFields)) {
        $sortBy = 'id';
    }

    // Validate sort_order
    $sortOrder = strtolower($sortOrder) === 'asc' ? 'asc' : 'desc';

    // Special handling for number field (stored as string, needs numeric sorting)
    if ($sortBy === 'number') {
        $query = $query->orderByRaw('CAST(number AS UNSIGNED) ' . strtoupper($sortOrder));
    } else {
        $query = $query->orderBy($sortBy, $sortOrder);
    }

    $research_index = $query->paginate(10)->appends($request->query());

    return view('magazine-index', compact('research_index'));
})->name('magazine-index');

/***************************************************************************/

// Dashboard
Route::resource('researches', ResearchesController::class)->only(['index', 'store', 'destroy'])->middleware(['auth']);

Route::resource('researchesIndex', ResearchIndexController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->middleware(['auth']);
Route::delete('researchesIndex-delete-all', [ResearchIndexController::class, 'deleteAll'])->name('researchesIndex.deleteAll')->middleware(['auth']);
Route::post('researchesIndex-import-excel', [ResearchIndexController::class, 'importExcel'])->name('researchesIndex.importExcel')->middleware(['auth']);

Route::resource('snapshots', SnapshotsController::class)->only(['index', 'store', 'destroy'])->middleware(['auth']);
Route::post('snapshots/{name}/load', [SnapshotsController::class, 'load'])->name('snapshots.load')->middleware(['auth']);

Route::get('optimize-clear', function () {
    try {
        Artisan::call('optimize:clear');
        $output = Artisan::output();
        return response()->json([
            'success' => true,
            'message' => 'تم مسح التخزين المؤقت بنجاح',
            'output' => $output
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ: ' . $e->getMessage()
        ], 500);
    }
})->name('optimize.clear')->middleware(['auth']);

require __DIR__ . '/auth.php';
