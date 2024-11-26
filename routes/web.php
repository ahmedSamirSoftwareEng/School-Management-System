<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;




Auth::routes();

Route::group(
    [
        'middleware' => ['guest'],
    ],
    function () {
        Route::get('/', function () {
            return view('auth.login');
        });
    }
);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
    ],
    function () {

        // Route::get('/', function () {
        //     return view('dashboard');
        // });
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


        Route::group(
            [
                'namespace' => 'Grades',
            ],
            function () {
                Route::resource('grades', 'GradeController');
            }
        );
        Route::group(
            [
                'namespace' => 'Classrooms',
            ],
            function () {
                Route::resource('Classrooms', 'ClassroomController');
                Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
                Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
            }
        );
        //==============================Sections============================

        Route::group(['namespace' => 'Sections'], function () {

            Route::resource('Sections', 'SectionController');

            Route::get('/classes/{id}', 'SectionController@getclasses');
        });
        //==============================parents============================

        Route::view('add_parent', 'livewire.show_Form');
        // =============================Teachers============================
        Route::group(['namespace' => 'Teachers'], function () {
            Route::resource('Teachers', 'TeacherController');
        });
        //==============================Students============================
        Route::group(['namespace' => 'Students'], function () {
            Route::resource('Students', 'StudentController');
            Route::resource('Promotion', 'PromotionController');
            Route::resource('Graduated', 'GraduatedController');
            Route::resource('Fees', 'FeesController');
            Route::resource('Fees_Invoices', 'FeesInvoicesController');
            Route::resource('receipt_students', 'ReceiptStudentsController');
            Route::resource('ProcessingFee', 'ProcessingFeeController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        });

       
    }
);
