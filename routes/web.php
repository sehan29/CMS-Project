<?php

use App\Http\Controllers\AdminComplainController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ComplaintReportController;
use App\Http\Controllers\ComplaintSearchController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubjectofficerComplaintReport;
use App\Http\Controllers\SubjectOfficerController;
use App\Http\Controllers\SubjectOfficerDivisionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::resource('events', EventController::class)->only(['index', 'store', 'update', 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:dashboard'])->name('dashboard'); */

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:dashboard'])
    ->name('dashboard');


Route::middleware(['auth', 'verified', 'rolemanager:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminComplainController::class,'dashboard'])->name('admin');
    Route::get('/manage_sub_officer', [SubjectOfficerController::class, 'index'])->name('sub_officer');
    Route::post('/subject-officers/search', [SubjectOfficerController::class, 'searchUser'])->name('admin.subject-officers.search');
    Route::post('/subject-officers', [SubjectOfficerController::class, 'store'])->name('admin.subject-officers.store');
    Route::put('/subject-officers/{id}', [SubjectOfficerController::class, 'update'])->name('admin.subject-officers.update');
    Route::delete('/subject-officers/{id}', [SubjectOfficerController::class, 'destroy'])->name('admin.subject-officers.destroy');
    Route::get('/manage_customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('complaint_report', [ComplaintReportController::class, 'index'])->name('complaint_report.index');
    Route::get('details_complaint_report/{month}',[ComplaintReportController::class,'report'])->name('details_complaint_report.report');
    Route::get('search',[SearchController::class,'search_user'])->name('search.search_user');
    Route::get('users/search', [SearchController::class, 'search'])->name('admin.users.search'); 
    Route::get('/users/{user}', [SearchController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [SearchController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [SearchController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [SearchController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('complaint_search',[ComplaintSearchController::class,'index'])->name('admin.complaint.index');
    Route::get('/complaints/search', [ComplaintSearchController::class, 'search'])->name('admin.complaints.search');
    Route::get('/complaints/{complaint}', [ComplaintSearchController::class, 'show'])->name('admin.complaints.show');
    Route::get('/complaints/{complaint}/edit', [ComplaintSearchController::class, 'edit'])->name('admin.complaints.edit');
    Route::put('/complaints/{complaint}', [ComplaintSearchController::class, 'update'])->name('admin.complaints.update');

});

Route::get('/complaints', [AdminComplainController::class, 'index'])->name('complaints.index');
Route::get('complaint/{id}', [AdminComplainController::class, 'show']);

Route::get('/over_due_complaints',[AdminComplainController::class,'over_due'])->name('over_due.index');

Route::get('/not-assigned',[AdminComplainController::class,'not_assign'])->name('complaints.not_assign');

Route::get('/sub-officer/dashboard', function () {
    return view('sub_officer.sub-officer');

})->middleware(['auth', 'verified','rolemanager:sub'])->name('sub');

Route::middleware(['auth', 'verified', 'rolemanager:sub'])->prefix('sub')->group(function () {

    Route::get('all-complaint',[SubjectOfficerDivisionController::class,'all_complaint'])->name('subject_officer.all_complaints');
    Route::get('over-due-complaint',[SubjectOfficerDivisionController::class,'over_complaint'])->name('subject_officer.over_complaints');
    Route::get('reconsideration-complaint',[SubjectOfficerDivisionController::class,'reconsideration_complaint'])->name('subject_officer.reconsideration_complaint');
    Route::get('closed-complaint',[SubjectOfficerDivisionController::class,'closed_complaint'])->name('subject_officer.closed');
    Route::get('complain_sub/{complaint}', [SubjectOfficerDivisionController::class, 'show'])->name('complain_sub.show');
    Route::get('sub_complaint_report',[SubjectofficerComplaintReport::class, 'sub_complaints'])->name('subject_officer.sub_complaint_report');



});



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
    Route::post('/complaints/{id}/reconsider', [ComplaintController::class, 'requestReconsideration'])->name('complaints.reconsider');
    Route::post('/complaints/{id}/rate', [ComplaintController::class, 'storeRating'])->name('complaints.rate');

});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/complaints', [AdminComplainController::class, 'index'])->name('complaints.index');
    Route::post('/complaints/{complaint}/assign', [AdminComplainController::class, 'assignDivision'])
        ->name('complaints.assign');
    Route::post('/complaints/{complaint}/note', [AdminComplainController::class, 'addNote'])
        ->name('complaints.note');
    Route::post('/complaints/{complaint}/resolve', [AdminComplainController::class, 'resolveComplaint'])
        ->name('complaints.resolve');
    Route::get('/not-assigned',[AdminComplainController::class,'not_assign'])
        ->name('complaints.not_assign');
    Route::get('/reconsideration',[AdminComplainController::class,'reconsideration'])
        ->name('complaints.reconsideration_complaint');
    Route::get('/print-pdf', [PDFController::class, 'print'])->name('pdf.print');
    Route::get('print-monthly-report/{month}', [PDFController::class, 'printMonthlyReport'])->name('print.monthly_report');

});
Route::get('compl/{complaint}', [AdminComplainController::class, 'show'])->name('compl.show');
Route::resource('events', EventController::class)->only(['index', 'store', 'update', 'destroy']);




require __DIR__.'/auth.php';
