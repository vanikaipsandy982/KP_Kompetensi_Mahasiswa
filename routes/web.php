<?php
use App\Http\Controllers;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ChiefMentorController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataDosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testquery;
use App\Http\Controllers\IsiSurveyController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('home');
});

//Bagian Josrel
Route::get('/editSurvey', [testquery::class,'show']);
Route::get('/isiSurvey', [IsiSurveyController::class,'index']);
Route::get('/surveyCat1',[IsiSurveyController::class,'category1']);
Route::get('/surveyCat2',[IsiSurveyController::class,'category2']);
Route::get('/surveyCat3',[IsiSurveyController::class,'category3']);
Route::get('/surveyCat4',[IsiSurveyController::class,'category4']);
Route::get('/surveyCat5',[IsiSurveyController::class,'category5']);
Route::get('/surveyCat6',[IsiSurveyController::class,'category6']);
Route::get('/surveyCat7',[IsiSurveyController::class,'category7']);
Route::get('/surveyCat8',[IsiSurveyController::class,'category8']);
Route::get('/surveyCat9',[IsiSurveyController::class,'category9']);
Route::get('/surveyCat10',[IsiSurveyController::class,'category10']);
Route::get('/surveyCat11',[IsiSurveyController::class,'category11']);
Route::get('/surveyCat12',[IsiSurveyController::class,'category12']);
Route::get('/surveyCat13',[IsiSurveyController::class,'category13']);
Route::get('/surveyCat14',[IsiSurveyController::class,'category14']);
Route::get('/hasilsurvey',[IsiSurveyController::class,'hasilsurvey']);
Route::post('/surveyCat1',[IsiSurveyController::class,'hasilRadio']);
Route::post('/surveyCat2',[IsiSurveyController::class,'hasilRadio']);

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
Route::post('/listFakultas/store', [FakultasController::class, 'store']);
Route::delete('/listFakultas/delete/{id}', [FakultasController::class, 'delete']);
Route::post('/listFakultas/update', [FakultasController::class, 'update']);

//Prodi
Route::get('/listProdi', [ProdiController::class, 'index']);
Route::post('/listProdi/store', [ProdiController::class, 'store']);

//Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/detailMhs', function(){
    return view('mahasiswa/detailmhs');
});

//Bagian Mic
//Chief Mentor
Route::get('/listChief', [ChiefMentorController::class, 'index']);
Route::post('/listChief/store', [ChiefMentorController::class, 'store']);
Route::delete('/listChief/delete/{id}', [ChiefMentorController::class, 'delete']);
Route::post('/listChief/update', [ChiefMentorController::class, 'update']);
//Data Karyawan
Route::get('/listKaryawan', [DataKaryawanController::class, 'index']);
//Data Dosen
Route::get('/listDosen', [DataDosenController::class, 'index']);

//Bagian Can
//AdminJadwal
Route::get('/listAdminJadwal',[Controllers\AdminJadwalController::class, 'index']);
//UserJadwal
Route::get('/listUserJadwal',[Controllers\UserJadwalController::class, 'index']);

//AdminKelompokController
Route::get('/listAdminKelompok',[Controllers\AdminKelompokController::class, 'index']);
//User Kelompok
Route::get('/listUserKelompok',[Controllers\UserKelompokController::class, 'index']);


//Profile
Route::get('/userProfile', function (){
    return view('user.profile');
});
