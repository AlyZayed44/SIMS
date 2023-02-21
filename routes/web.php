<?php

use App\Http\Controllers\courseGrade;
use App\Http\Controllers\info_controller;
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
Route::resource('/info',info_controller::class);
Route::get('/infoData', [info_controller::class,'showCourses'])->name('infoData');
Route::get('/getData', [info_controller::class,'getCourses'])->name('getCourses');
Route::resource('/grade',courseGrade::class);
Route::get('/getCourses', [info_controller::class,'indexCourse'])->name('getAllCourses');
Route::get('/infoStudents', [info_controller::class,'showStudents'])->name('infoStudents');
Route::get('/addStudentToCourse', [info_controller::class,'getStudents'])->name('addStudent');
Route::get('/removeCourseFromStudent', [courseGrade::class,'removeCourseFromStudent'])->name('removeCourseFromStudent');