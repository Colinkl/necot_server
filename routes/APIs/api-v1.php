<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'news'], function() {
    Route::get('', 'NewsController@index');
    Route::get('{news}', 'NewsController@show');
});

Route::group(['prefix' => 'events'], function() {
   Route::get('', 'EventController@index');
   Route::get('{event}', 'EventController@show');
});

Route::group(['prefix' => 'mentors'], function() {
    Route::get('', 'MentorController@index');
    Route::post('', 'MentorController@store');
    Route::get('{mentor}', 'MentorController@show');
    Route::delete('{mentor}', 'MentorController@delete');
});

Route::group(['prefix' => 'courses'], function() {
    Route::get('', 'CourseController@index');
    Route::post('', 'CourseController@store');
    Route::get('{course}', 'CourseController@show');
});

Route::group(['prefix' => 'diaries'], function() {
    Route::get('', 'DiaryController@index');
    Route::post('', 'DiaryController@store');
    Route::get('{diary}', 'DiaryController@show');
});
