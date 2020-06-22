<?php

use App\student;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//student detail //student profile
Route::get('student/{student}','api\StudenControllerApi@StudentDetail');

Route::post('/student/login', 'api\StudenControllerApi@login');

Route::post('/student/reset', 'api\StudenControllerApi@reset');
Route::get('/gallery', 'api\GalleryControllerApi@index');
Route::get('/teacher', 'api\TeacherControllerApi@index');
Route::get('/attendance/{id}/{month}', 'api\AttendanceControllerApi@index');
Route::get('/diary/{id}', 'api\DiaryControllerApi@index');
Route::get('result','api\ResultControllerApi@index');

Route::get('notice','api\NoticeControllerApi@index');
Route::get('holiday','api\HolidayControllerApi@index');
Route::get('timetable/{class_id}','api\TimetableControllerApi@index');

Route::get('/result/{student_id}','api\ResultControllerApi@index');
Route::get('/recentresult/{student_id}','api\ResultControllerApi@recent');

Route::get('/resultshow/{student_id},{class_id}','api\ResultControllerApi@show');

Route::get('/fees/{student_id}','api\FeesControllerApi@index');
Route::get('/downloads','api\DownloadableResourcesControllerApi@index');

