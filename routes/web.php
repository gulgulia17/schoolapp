<?php

use Illuminate\Support\Facades\Auth;
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
    return view('/auth.login');
});

Auth::routes();
Route::group(['middleware' => ['web','auth',]],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Auth\RegisterController@register');

    //School Profile
    Route::resource('/setting', 'SchoolController');

    //attendance
    Route::resource('/attendance', 'AttendanceController');
    Route::post('/attendance/check', 'AttendanceController@check');

    //student
    Route::get('/student/import','StudentController@import');
    Route::POST('/student/import','StudentController@importStudent');
    Route::resource('/student', 'StudentController');
    Route::post('/student/check', 'StudentController@check');
    
    //fees
    Route::get('/fees','FeesController@index')->name('fees.index');
    Route::post('/fees','FeesController@store')->name('fees.store');
    Route::delete('/fees/{fee}','FeesController@destroy')->name('fees.destroy');

    //driver
    Route::resource('/driver','DriverController');

    // NOTICE BOARD
    Route::resource('/notice','NoticeController');

    //classes
    Route::get('classes','ClassesController@index')->name('classes.index');
    Route::post('/classes','ClassesController@store')->name('classes.store');
    Route::delete('/classes/{classes}','ClassesController@destroy')->name('classes.destroy');

    //Gallery
    Route::resource('/gallery','GalleryController');

    //Facility
    Route::resource('/facility','FacilityController');

    //Diary
    Route::resource('/diary','DiaryController');
    Route::post('/diary/check','DiaryController@check');

    //teacher
    Route::resource('/teacher','TeacherController');

    //Leave
    Route::resource('/leave','LeaveController');
    Route::post('/leave/filter','LeaveController@filter');

    //holiday
    Route::resource('/holiday','HolidayController');

    //calendar
    Route::resource('/events','EventController');
    Route::get('displaydata','EventController@show');

    //result
    Route::resource('/result', 'ResultController');
    // Route::post('/show/student','ResultController@showStudent');
    // Route::get('/result/show','ResultController@showResult');
    Route::post('/result/open','ResultController@createResult');
    Route::post('/show/detail','ResultController@showDetail');

    //feeRecord
    Route::resource('/feerecord', 'FeeRecordController');
    Route::post('/record', 'FeeRecordController@record');
    Route::post('/fee/check', 'FeeRecordController@check');

    // Subject
    Route::resource('/subject', 'SubjectController');
    // Time Table
    Route::resource('/timetable', 'TimeTableController');
    Route::post('/timetable/check', 'TimeTableController@check');
    Route::resource('/downloads','DownloadableResourcesController');

    // Change Password
    Route::get('password/change','Auth\PasswordChangeController@showChangePasswordForm')->name('password.change');
    Route::POST('/password/change', 'Auth\PasswordChangeController@changePassword');
});
