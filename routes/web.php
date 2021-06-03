<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testquery;
use App\Http\Controllers\IsiSurveyController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('home');
});

Route::get('/editSurvey', [testquery::class,'show']);
Route::get('/isiSurvey', [IsiSurveyController::class,'index']);
Route::get('/surveyCat1',[IsiSurveyController::class,'category1']);

//Bagian Josrel
//Route::get('/isiSurvey', function () {
//    return view('survey/isiSurvey');
//});
//Route::get('/surveyCategory1', function () {
//    return view('survey/surveyCat1');
//});
Route::get('/polosan', function () {
    return view('polosan');
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
Route::get('/detailMhs', function(){
    return view('mahasiswa/detailmhs');
});
//Fakultas
Route::get('/listFakultas', function(){
    return view('fakultas/index');
});
//Prodi
Route::get('/listProdi', function(){
    return view('prodi/index');
});

//Bagian Mic
//Chief Mentor
Route::get('/listChief', function(){
    return view('chiefmentor/index');
});
