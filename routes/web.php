<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('students', 'StudentController');
Route::get('/liveSearchExample', function () {return view('students/liveSearchExample'); })->name('liveSearchExample');
Route::post('liveStudentSearch', 'liveSearchContoller@liveStudentSearch')->name('liveStudentSearch');