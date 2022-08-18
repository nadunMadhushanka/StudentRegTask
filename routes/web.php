<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add',[App\Http\Controllers\HomeController::class, 'addCat']);
Route::post('/addCategories',[App\Http\Controllers\CategoryController::class, 'store']);
Route::post('/addStudents', [App\Http\Controllers\StudentController::class, 'store']);
Route::post('/addCourses', [App\Http\Controllers\CourseController::class, 'store']);
Route::post('/studentCourses', [App\Http\Controllers\StudentController::class, 'storeCourses']);
Route::get('/GetSubCaurseAgainstMainCat/{id}',[App\Http\Controllers\DynamicController::class, 'findCourseNames']);

    
