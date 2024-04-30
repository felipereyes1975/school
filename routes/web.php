<?php

use App\Http\Controllers\HourController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

    //UNLIMITED ROUTEEEESSS
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

    Route::get('/matters', [MatterController::class, 'index'])->name('matters.index');
    Route::post('/matters/new', [MatterController::class, 'store'])->name('matters.create');
    Route::get('/matters/new', [MatterController::class, 'create'])->name('matters.store');
    Route::get('/matters/view/{id?}', [MatterController::class, 'view'])->name('matters.view');
    Route::post('/matters/show', [MatterController::class, 'show'])->name('matters.show');
    Route::get('matters/edit/{id?}', [MatterController::class, 'edit'])->name('matters.edit');
    Route::post('matters/edit/{id?}', [MatterController::class, 'update'])->name('matters.update');
    Route::post('/matters', [MatterController::class, 'destroy'])->name('matters.delete');
    Route::get('/matters/restore', [MatterController::class, 'restore'])->name('matters.restore');
    Route::post('/matters/restore', [MatterController::class, 'restoredd'])->name('matters.restoredd');

});

require __DIR__.'/auth.php';
