<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/detection')->group(function () {
    Route::get('/', [DetectionController::class, 'index'])
        ->middleware('auth')
        ->name('detection.index');
    Route::post('/', [DetectionController::class, 'store'])
        ->name('detection.store');
});


require __DIR__.'/auth.php';
