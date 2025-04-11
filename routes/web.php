<?php

use App\Http\Controllers\AdminComplainController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectOfficerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:dashboard'])->name('dashboard');



Route::middleware(['auth', 'verified', 'rolemanager:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin');

    Route::get('/manage_sub_officer', [SubjectOfficerController::class, 'index'])->name('sub_officer');
    Route::post('/subject-officers/search', [SubjectOfficerController::class, 'searchUser'])->name('admin.subject-officers.search');
    Route::post('/subject-officers', [SubjectOfficerController::class, 'store'])->name('admin.subject-officers.store');
    Route::put('/subject-officers/{id}', [SubjectOfficerController::class, 'update'])->name('admin.subject-officers.update');
    Route::delete('/subject-officers/{id}', [SubjectOfficerController::class, 'destroy'])->name('admin.subject-officers.destroy');
    Route::get('/manage_customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

Route::get('/complaints', [AdminComplainController::class, 'index'])->name('complaints.index');
Route::get('complaint/{id}', [AdminComplainController::class, 'show']);

Route::get('/over_due_complaints',[AdminComplainController::class,'over_due'])->name('over_due.index');

Route::get('/not-assigned',[AdminComplainController::class,'not_assign'])->name('complaints.not_assign');

Route::get('/sub-officer/dashboard', function () {
    return view('sub_officer.sub-officer');
})->middleware(['auth', 'verified','rolemanager:sub'])->name('sub');

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
    Route::post('/complaints/{id}/rate', [ComplaintController::class, 'storeRating'])->name('complaints.rate');

});

Route::prefix('admin')->name('admin.')->group(function() {
    // Complaints routes
    Route::get('/complaints', [AdminComplainController::class, 'index'])->name('complaints.index');
    
    // Complaint actions
    Route::post('/complaints/{complaint}/assign', [AdminComplainController::class, 'assignDivision'])
        ->name('complaints.assign');
    Route::post('/complaints/{complaint}/note', [AdminComplainController::class, 'addNote'])
        ->name('complaints.note');
    Route::post('/complaints/{complaint}/resolve', [AdminComplainController::class, 'resolveComplaint'])
        ->name('complaints.resolve');
    Route::get('/not-assigned',[AdminComplainController::class,'not_assign'])
        ->name('complaints.not_assign');
});
Route::get('compl/{complaint}', [AdminComplainController::class, 'show']);


require __DIR__.'/auth.php';
