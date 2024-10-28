<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', function () {
            return view('dashboard');
        });
        Route::resource('grade', GradeController::class);
    }
);
