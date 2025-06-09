<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrashedController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('students', StudentController::class);
Route::get('students/export/pdf', [StudentController::class, 'exportPdf'])->name('students.export.pdf');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('students', StudentController::class);
    Route::get('students/export/pdf', [StudentController::class, 'exportPdf'])->name('students.export.pdf');

    // Contact routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

    // Trashed Items Routes
    Route::get('/trashed', [TrashedController::class, 'index'])->name('trashed.index');
    Route::post('/trashed/student/{id}/restore', [TrashedController::class, 'restoreStudent'])->name('trashed.restore.student');
    Route::post('/trashed/city/{id}/restore', [TrashedController::class, 'restoreCity'])->name('trashed.restore.city');
    Route::delete('/trashed/student/{id}/force-delete', [TrashedController::class, 'forceDeleteStudent'])->name('trashed.force-delete.student');
    Route::delete('/trashed/city/{id}/force-delete', [TrashedController::class, 'forceDeleteCity'])->name('trashed.force-delete.city');
});

require __DIR__.'/auth.php';
