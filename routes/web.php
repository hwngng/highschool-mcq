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

Auth::routes([
    'confirm' => false,
    'reset' => false,
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@aboutUs')->name('about_us');
Route::group(['middleware' => ['auth']], function () {
    //temp
    Route::get('/experts', 'TeacherController@list')->name('experts');

    Route::name('teacher.')
        ->prefix('teacher')
        ->middleware('authorize:teacher')
        ->group(function () {
            Route::name('index')->get('/', 'TeacherController@index');
            Route::name('about')->get('/about/{id}', 'TeacherController@about');
            Route::name('question.')->prefix('question')->group(function () {
                Route::name('list')->get('/', 'QuestionController@index');
                Route::name('create')->get('/create', 'QuestionController@create')->middleware('authorize:teacher');
                Route::name('get')->get('/{id}', 'QuestionController@getById');
                Route::name('store')->post('/', 'QuestionController@store')->middleware('authorize:teacher');
                Route::name('destroy')->get('/destroy/{id}', 'QuestionController@destroy')->middleware('authorize:teacher');
                Route::name('edit')->get('/edit/{id}', 'QuestionController@edit')->middleware('authorize:teacher');
                Route::name('update')->post('/update', 'QuestionController@update')->middleware('authorize:teacher');
            });

            Route::name('test.')->prefix('test')->group(function () {
                Route::name('list')->get('/', 'TestController@index');
                Route::name('create')->get('/create', 'TestController@create')->middleware('authorize:teacher');
                Route::name('store')->post('/store', 'TestController@store')->middleware('authorize:teacher');
                Route::name('edit')->get('/edit/{id}', 'TestController@edit')->middleware('authorize:teacher');
                Route::name('update')->post('/update', 'TestController@update')->middleware('authorize:teacher');
                Route::name('destroy')->get('/destroy/{id}', 'TestController@destroy')->middleware('authorize:teacher');
            });
            Route::name('class.')->prefix('class')->group(function () {
                Route::name('list')->get('/', 'ClassController@index');
                Route::name('create')->get('/create', 'ClassController@create')->middleware('authorize:teacher');
                Route::name('store')->post('/store', 'ClassController@store')->middleware('authorize:teacher');
                Route::name('edit')->get('/edit', 'ClassController@edit')->middleware('authorize:teacher');
                Route::name('update')->post('/update', 'ClassController@update')->middleware('authorize:teacher');
                Route::name('detail')->get('/detail/{id}', 'ClassController@detail')->middleware('authorize:teacher');
                Route::name('kick')->get('/kick/{id}/{memberId?}', 'ClassController@removeMember')->middleware('authorize:teacher');
                Route::name('addExams')->post('/addexams/{id}', 'ClassTestController@store')->middleware('authorize:teacher');
            });
            Route::name('result.')->prefix('result')->group(function () {
                Route::name('list')->get('/', 'WorkHistoryController@showAllTestResult')->middleware('authorize:teacher');
                Route::name('detail')->get('/result/{testId}', 'WorkHistoryController@getStudentResultByTestId')->middleware('authorize:teacher');
            });
            Route::name('user.')->prefix('user')->group(function () {
                Route::name('update')->post('/update', 'UserController@update');
            });
        });

    Route::name('admin.')
        ->prefix('admin')
        ->middleware('authorize:admin')
        ->group(function () {
            Route::name('index')->get('/', 'AdminController@index');
            Route::name('user.')->prefix('user')->group(function () {
                Route::name('list')->get('/', 'UserController@index');
                Route::name('create')->post('/create', 'UserController@createUser');
                Route::name('show')->get('/{id}', 'UserController@show');
                Route::name('store')->post('/store', 'UserController@store');
                Route::name('destroy')->get('/destroy/{id}', 'UserController@destroy');
                Route::name('update')->post('/update', 'UserController@update');
            });
        });

    Route::name('student.')
        ->prefix('student')
        ->middleware('authorize:student')
        ->group(function () {
            Route::name('index')->get('/', 'StudentController@index');
            Route::name('about')->get('/about/{id}', 'StudentController@about');
            Route::name('test.')->prefix('test')->group(function () {
                Route::name('list')->get('/list', 'StudentController@getAllAvailableTests');
                Route::name('start')->get('/{id}', 'WorkHistoryController@startTest')->middleware('authorize:student');
                Route::name('update')->post('/update/{id}', 'WorkHistoryController@updateTestResult')->middleware('authorize:student');
                Route::name('finish')->post('/finish', 'WorkHistoryController@completeTest')->middleware('authorize:student');
                Route::name('ready')->get('/ready/{id}', 'TestController@ready')->middleware('authorize:student');
            });
            Route::name('class.')->prefix('class')->group(function () {
                Route::name('list')->get('/', 'ClassController@index');
                Route::name('detail')->get('/detail/{id}', 'ClassController@detail');
                Route::name('leave')->get('/leave/{id}', 'ClassController@removeMember');
                Route::name('join')->post('/join', 'ClassController@memberJoin');
            });
            Route::name('result.')->prefix('result')->group(function () {
                Route::name('detail')->get('/{userId}/{testId}', 'WorkHistoryController@getResultByTestIdAnduserId')->middleware('authorize:student');
                Route::name('list')->get('/{userId}', 'WorkHistoryController@getStudentResultByUserId')->middleware('authorize:student');
            });
            Route::name('user.')->prefix('user')->group(function () {
                Route::name('update')->post('/update', 'UserController@update');
            });
        });
});
