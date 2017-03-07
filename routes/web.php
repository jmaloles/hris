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
        Route::patch('/{applicant}/hire', 'Admin\ApplicantController@hireApplicant')->name('admin_hire_applicant');
    });

    Route::group(['prefix' => 'employee'], function() {
        Route::get('/{employee}/profile', 'Admin\EmployeeController@show')->name('admin_user_employee_show');
        Route::get('/{employee}/edit', 'Admin\EmployeeController@edit')->name('admin_user_employee_edit');
        Route::patch('/{employee}/update_leaves', 'Admin\EmployeeController@adminEmployeeUpdateLeave')->name('admin_user_employee_update_leaves');
        Route::post('/{employee}/leave/vacation/submit', 'Employee\VacationLeaveController@store')->name('admin_user_employee_file_vacation_leaves');
        Route::patch('/{employee}/information/update', 'Admin\EmployeeController@update')->name('admin_user_employee_update');
    });
});

Route::resource('memoranda', 'MemorandumController');
Route::resource('announcements', 'AnnouncementController');
Route::resource('exams', 'ExamController');
Route::resource('trainings', 'TrainingController');
Route::resource('attendances', 'AttendanceController');
Route::resource('interviews', 'InterviewController');
