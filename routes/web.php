<?php
use App\Http\Controllers;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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
//Fakultas
Route::get('/listFakultas', [FakultasController::class, 'index']);
//Prodi
Route::get('/listProdi', [ProdiController::class, 'index']);
//Mahasiswa
Route::get('/listMhs', [MahasiswaController::class, 'index']);
Route::get('/detailMhs', function(){
    return view('mahasiswa/detailmhs');
});

//Bagian Mic
//Chief Mentor
Route::get('/listChief', function(){
    return view('chiefmentor/index');
});
