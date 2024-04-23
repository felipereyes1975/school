<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students/new', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/new', [StudentController::class, 'create'])->name('students.store');
    Route::get('/students/view/{id?}', [StudentController::class, 'view'])->name('students.view');
    Route::post('/students/delete', [StudentController::class, 'show'])->name('students.show');
    Route::get('students/edit/{id?}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('students/edit/{id?}', [StudentController::class, 'update'])->name('students.update');
    Route::post('/students', [StudentController::class, 'destroy'])->name('students.delete');
    Route::get('/students/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::post('/students/restore', [StudentController::class, 'restoredd'])->name('students.restoredd');
});

require __DIR__.'/auth.php';
