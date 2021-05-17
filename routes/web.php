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

Route::get('/', function () {
    return view('home');
});
Route::get('/index', function () {
    return view('home');
});

//Route::get('/isiSurvey/', 'SurveyController@index');
//Route::get('/isiSurvey/cat1', 'SurveyController@Category1');
Route::get('/isiSurvey', function () {
    return view('isiSurvey');
});
Route::get('/surveyCategory1', function () {
    return view('surveyCat1');
});
Route::get('/polosan', function () {
    return view('polosan');
});
//Route::get('/isiSurvey/Category1', function () {
//    return view('surveyCat1');
//});
Route::get('/editSurvey', function () {
    return view('editSurvey');
});
