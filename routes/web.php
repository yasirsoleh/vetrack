<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetectionController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\RouteController;

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

Route::prefix('/camera')->group(function () {
    Route::get('/', [CameraController::class, 'index'])
        ->middleware('auth')
        ->name('camera.index');
    Route::get('/create', [CameraController::class, 'create'])
        ->middleware('auth')
        ->name('camera.create');
    Route::post('/', [CameraController::class, 'store'])
        ->middleware('auth')
        ->name('camera.store');
});

Route::prefix('/route')->group(function () {
    Route::get('/', [RouteController::class, 'index'])
        ->middleware('auth')
        ->name('route.index');
    Route::get('/show/{plate_number}', [RouteController::class, 'show'])
        ->middleware('auth')
        ->name('route.show');
});


require __DIR__.'/auth.php';
