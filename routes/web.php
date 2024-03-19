<?php

use App\Http\Controllers\ResearchesController;
use App\Http\Controllers\ResearchIndexController;
use App\Models\Researches\Research;
use App\Models\Researches\ResearchIndex;
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

    if ($request->search) {
        $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
    }

    $researches = $query->paginate(10);

    return view('electronic-publishing', compact('researches'));
})->name('electronic-publishing');

Route::get('magazine-index', function (Request $request) {
    $query = ResearchIndex::query();

    if ($request->search) {
        $query = $query->where($request->sort_by, 'like', '%' . $request->search . '%');
    }

    $research_index = $query->paginate(10);
    return view('magazine-index', compact('research_index'));
})->name('magazine-index');

/***************************************************************************/

// Dashboard
Route::resource('researches', ResearchesController::class)->middleware(['auth']);

Route::resource('researchesIndex', ResearchIndexController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
