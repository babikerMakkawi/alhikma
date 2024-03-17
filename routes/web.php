<?php

use App\Http\Controllers\ResearchesController;
use App\Models\Researches\Research;
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

Route::get('magazine-index', function () {
    $researches = Research::paginate();
    return view('magazine-index', compact('researches'));
});

// Dashboard
Route::get('admin-researches', function (Request $request) {
    $researches = Research::all();
    return view('dashboard.researches.index', compact('researches'));
});

Route::resource('researches', ResearchesController::class)->middleware(['auth']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
