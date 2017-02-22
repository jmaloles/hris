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
})->name('welcome');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('applicant/registration', 'ApplicantController@create')->name('applicant_registration');
Route::post('applicant/store', 'ApplicantController@store')->name('applicant_store');

Route::group(['prefix' => 'user'], function() {
    Route::get('/employees', 'Admin\UserController@index')->name('admin_user_index');
    Route::get('/create', 'Admin\UserController@create')->name('admin_user_create');
    Route::post('/store', 'Admin\PendingUserController@store')->name('admin_pending_user_store');

    Route::get('/applicants', 'ApplicantController@index')->name('admin_user_applicant_index');
    Route::group(['prefix' => 'applicant'], function() {
        Route::get('/{applicant}', 'Admin\ApplicantController@show')->name('admin_user_applicant_show');
        Route::get('/{applicant}/edit', 'Admin\ApplicantController@edit')->name('admin_applicant_edit');
        Route::patch('/{applicant}/update', 'Admin\ApplicantController@update')->name('admin_user_applicant_update');
    });
});