<?php

use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

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

Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->middleware(['auth'])->name('image.upload.post');

Route::get('image-gallery', [ ImageGalleryController::class, 'index' ]);
Route::post('image-gallery', [ ImageGalleryController::class, 'upload' ]);
Route::delete('image-gallery/{id}', [ ImageGalleryController::class, 'destroy' ]);



require __DIR__.'/auth.php';
