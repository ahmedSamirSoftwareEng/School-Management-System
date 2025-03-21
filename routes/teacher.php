<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Student;
use App\Teacher;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {
        //==============================dashboard============================
        Route::get('/teacher/dashboard', function () {
            $sections_ids = Teacher::findorfail(Auth::user()->id)->Sections()->pluck('sections.id');
            $data['count_sections'] = $sections_ids->count();
            $data['count_students'] = Student::whereIn('section_id', $sections_ids)->count();

            return view('pages.Teachers.dashboard', $data);
        });
        Route::group(['namespace' => 'Teachers\dashboard'], function () {
            //==============================students============================
            Route::get('student', 'StudentController@index')->name('student.index');
            Route::get('sections', 'StudentController@sections')->name('sections');
            Route::post('attendance', 'StudentController@attendance')->name('attendance');
            Route::post('edit_attendance', 'StudentController@editAttendance')->name('attendance.edit');
            Route::get('attendance_report', 'StudentController@attendanceReport')->name('attendance.report');
            Route::post('attendance_report', 'StudentController@attendanceSearch')->name('attendance.search');
            Route::resource('Quizzes', 'QuizzController');
            Route::resource('questions', 'QuestionController');
            Route::get('profile', 'ProfileController@index')->name('profile.show');
            Route::post('profile/{id}', 'ProfileController@update')->name('profile.update');
            Route::get('student_quizze/{id}', 'QuizzController@student_quizze')->name('student.quizze');
            Route::post('repeat_quizze', 'QuizzController@repeat_quizze')->name('repeat.quizze');
        });
    }
);
