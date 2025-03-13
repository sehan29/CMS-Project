<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Slide Navigation Routes */
    Route::get('/create',[CreateController::class, 'index'])->name('create.index');
    Route::get('/history',[HistoryController::class, 'index'])->name('history.index');
    Route::post('/upload-profile', [ProfileController::class, 'upload_img'])->name('profile.upload');

    /* Make Complaint Routes */
    Route::post('/complaint/store', [ComplaintController::class, 'store'])->name('complaint.store');
    Route::post('/complaint/upload', [ComplaintController::class, 'upload'])->name('complaint.upload');

    Route::get('/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');



});

require __DIR__.'/auth.php';
