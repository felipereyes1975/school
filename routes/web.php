<?php

use App\Http\Controllers\HourController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
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
    Route::get('/students/inscription/{id?}', [StudentController::class, 'inscription'])->name('students.inscription');
    Route::post('/students/inscription/{id?}', [StudentCourseController::class, 'store'])->name('studentcourse.store');

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

    //routesssssssssssssssssssstudentcourse
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/courses/new', [CourseController::class, 'store'])->name('courses.create');
    Route::get('/courses/new', [CourseController::class, 'create'])->name('courses.store');
    Route::get('/courses/view/{id?}', [CourseController::class, 'view'])->name('courses.view');
    Route::post('/courses/show', [CourseController::class, 'show'])->name('courses.show');
    Route::get('courses/edit/{id?}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('courses/edit/{id?}', [CourseController::class, 'update'])->name('courses.update');
    Route::post('/courses', [CourseController::class, 'destroy'])->name('courses.delete');
    Route::get('/courses/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::post('/courses/restore', [CourseController::class, 'restoredd'])->name('courses.restoredd');
    Route::get('/courses/{id?}/assistants', [StudentCourseController::class, 'show'])->name('studentcourse.show');
    //yesssssssssssssssssssssssssssssssssssss
    Route::get('/evaluation', [StudentCourseController::class, 'index'])->name('evaluation.index');
    Route::get('/evaluation/courses', [StudentCourseController::class, 'courses'])->name('evaluation.courses');
    Route::post('/evaluation/courses', [StudentCourseController::class, 'coursesearch'])->name('evaluation.coursesearch');
    Route::get('/evaluation/students', [StudentCourseController::class, 'students'])->name('evaluation.students');
    Route::post('/evaluation/students', [StudentCourseController::class, 'search'])->name('evaluation.studentsearch');
    Route::get('/evaluation/students/{id?}', [StudentCourseController::class, 'single'])->name('evaluation.single');
    Route::get('/evaluation/courses/{id?}', [StudentCourseController::class, 'grupal'])->name('evaluation.grupal');
    Route::post('/evaluation/courses/{id?}', [StudentCourseController::class, 'update'])->name('evaluation.update');
    Route::get('/evaluation/students/{id?}', [StudentCourseController::class, 'single'])->name('evaluation.single');
    Route::post('/evaluation/students/{id?}', [StudentCourseController::class, 'update'])->name('evaluation.update');
    Route::get('/students/kardex/{id?}', [StudentCourseController::class, 'kardex'])->name('evaluation.kardex');
});

require __DIR__.'/auth.php';
