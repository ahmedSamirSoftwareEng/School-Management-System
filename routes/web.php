<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
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
    });




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

        Route::resource('grade', GradeController::class);
    }
);
