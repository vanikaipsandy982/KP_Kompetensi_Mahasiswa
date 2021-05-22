<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testquery;

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
});
Route::get('/index', function () {
    return view('home');
});

Route::get('/editSurvey', [testquery::class,'show']);
//Route::get('/isiSurvey/cat1', 'SurveyController@Category1');

//Bagian Josrel
Route::get('/isiSurvey', function () {
    return view('survey/isiSurvey');
});
Route::get('/surveyCategory1', function () {
    return view('survey/surveyCat1');
});
Route::get('/polosan', function () {
    return view('survey/polosan');
});
//Route::get('/isiSurvey/Category1', function () {
//    return view('surveyCat1');
//});
//Route::get('/editSurvey', function () {
//    return view('survey/editSurvey');
//});

//Bagian Vanika
//Mahasiswa
Route::get('/listMhs', function(){
    return view('mahasiswa/index');
});
//Fakultas
Route::get('/listFakultas', function(){
    return view('fakultas/index');
});
//Prodi
Route::get('/listProdi', function(){
    return view('prodi/index');
});
