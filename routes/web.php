<?php

use App\Http\Controllers\HourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Database\Seeders\HourSeeder;
use Illuminate\Routing\RouteRegistrar;
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
    Route::post('/students/new', [StudentController::class, 'store'])->name('students.create');
    Route::get('/students/new', [StudentController::class, 'create'])->name('students.store');
    Route::get('/students/view/{id?}', [StudentController::class, 'view'])->name('students.view');
    Route::post('/students/show', [StudentController::class, 'show'])->name('students.show');
    Route::get('students/edit/{id?}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('students/edit/{id?}', [StudentController::class, 'update'])->name('students.update');
    Route::post('/students', [StudentController::class, 'destroy'])->name('students.delete');
    Route::get('/students/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::post('/students/restore', [StudentController::class, 'restoredd'])->name('students.restoredd');
    // to much routes daaaammmmnn
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::post('/teachers/show', [TeacherController::class, 'show'])->name('teachers.show');
    Route::post('/teachers', [TeacherController::class, 'destroy'])->name('teachers.delete');
    Route::get('/teachers/new', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers/new', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/view/{id?}', [TeacherController::class, 'view'])->name('teachers.view');
    Route::get('/teachers/restore', [TeacherController::class, 'restore'])->name('teachers.restore');
    Route::post('/teachers/restore', [TeacherController::class, 'restoredd'])->name('teachers.restoredd');
    Route::get('/teachers/edit/{id?}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/teachers/edit/{id?}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::post('/teachers/show', [TeacherController::class, 'show'])->name('teachers.show');

    Route::get('/hours', [HourController::class, 'index'])->name('hours.index');
    Route::post('/hours/new', [HourController::class, 'store'])->name('hours.create');
    Route::get('/hours/new', [HourController::class, 'create'])->name('hours.store');
    Route::get('/hours/view/{id?}', [HourController::class, 'view'])->name('hours.view');
    Route::post('/hours/show', [HourController::class, 'show'])->name('hours.show');
    Route::get('hours/edit/{id?}', [HourController::class, 'edit'])->name('hours.edit');
    Route::post('hours/edit/{id?}', [HourController::class, 'update'])->name('hours.update');
    Route::post('/hours', [HourController::class, 'destroy'])->name('hours.delete');
    Route::get('/hours/restore', [HourController::class, 'restore'])->name('hours.restore');
    Route::post('/hours/restore', [HourController::class, 'restoredd'])->name('hours.restoredd');
    // Route::post('/teachers', [TeacherController::class, 'destroy'])->name('teachers.delete');



});

require __DIR__.'/auth.php';
