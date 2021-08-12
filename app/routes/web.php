<?php

use App\Http\Controllers\EditableGradeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGroupController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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




Route::group(['middleware'=>'CheckRole:SUPER-ADMIN'], function() {
//    dd('viduje');
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::group(['prefix' => 'persons'], function(){
        Route::get('', [PersonController::class, 'index'])->name('person.index');
        Route::get('create', [PersonController::class, 'create'])->name('person.create');
        Route::post('store', [PersonController::class, 'store'])->name('person.store');
        Route::get('edit/{person}', [PersonController::class, 'edit'])->name('person.edit');
        Route::put('update/{person}', [PersonController::class, 'update'])->name('person.update');
        Route::post('delete/{person}', [PersonController::class, 'destroy'])->name('person.destroy');
        Route::get('show/{person}', [PersonController::class, 'show'])->name('person.show');
    });

    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('schools', SchoolController::class);
    Route::resource('groups', StudentGroupController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('grades', GradeController::class);
    Route::resource('edgrades', EditableGradeController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('schedules', ScheduleController::class);

});
