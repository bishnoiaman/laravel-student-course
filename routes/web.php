<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CourseController;
use \App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('/course',CourseController::class);
route::resource('/student',StudentController::class);
//Route::get('/editscourse',[StudentController::class,'loadcourse']);
 route::get('/courseap/{id}/{sid}',[CourseController::class,'loadcourse']);
route::patch('/studentcoursse/{id}',[StudentController::class,'studentcourseo']);

route::resource('/studentcourse/{id}',studentcontroller::class);


Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');
