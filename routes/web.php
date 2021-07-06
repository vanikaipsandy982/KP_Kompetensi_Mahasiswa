<?php
use App\Http\Controllers;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ChiefMentorController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataDosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testquery;
use App\Http\Controllers\IsiSurveyController;
use App\Http\Controllers\CategorySurvey;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\chartSurveyController;


Route::get('/', function(){
    return redirect('login');
});
//Route::post('/login',[Controllers\Auth\AuthenticatedSessionController::class,'store']);
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::middleware(['auth'])->group(function () {
//
//}

Route::get('/home', function () {
    return view('welcome');
});

//Bagian Josrel
Route::get('/editSurvey', [SurveyController::class,'showSurvey']);
Route::get('/lihat_survey{id}', [SurveyController::class,'detailSurvey']);
Route::post('/lihat_survey/store', [SurveyController::class,'store']);
Route::delete('/lihat_survey/delete/{nomor}{id}', [SurveyController::class, 'delete']);
//Route::post('/lihat_survey/update', [SurveyController::class, 'update']);
Route::get('/update_survey{id}', [SurveyController::class, 'edit']);
Route::patch('/update/{id}{nomor}', [SurveyController::class, 'update']);
Route::get('/hasilsurveyExport', [SurveyController::class, 'export']);
Route::get('/chartSurvey', [chartSurveyController::class, 'index']);
Route::get('/chartSurvey', [chartSurveyController::class, 'hasilsurvey']);

Route::get('/isiSurvey', [IsiSurveyController::class,'index']);
Route::get('/category_survey',[CategorySurvey::class,'index']);
Route::get('/surveyCat',[IsiSurveyController::class,'category']);
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
Route::post('/savehasilsurvey',[IsiSurveyController::class,'save']);
Route::post('/category_survey',[CategorySurvey::class,'store']);
//Route::post('/surveyCat1',[IsiSurveyController::class,'hasilRadio']);
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
Route::delete('/listProdi/delete/{id}', [ProdiController::class, 'delete']);
Route::post('/listProdi/update', [ProdiController::class, 'update']);
Route::get('/prodiedit{id}', [ProdiController::class, 'edit']);
Route::patch('/prodiupdate/{id}', [ProdiController::class, 'update']);

//Mahasiswa
Route::get('/listMahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswacr', [MahasiswaController::class, 'create']);
Route::post('/mahasiswastore', [MahasiswaController::class, 'store']);
Route::get('/mahasiswaedit{id}', [MahasiswaController::class, 'edit']);
Route::patch('/mahasiswaupdate/{id}', [MahasiswaController::class, 'update']);
Route::delete('/listMahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
//Route::get('/mahasiswaexport', [MahasiswaController::class, 'export']);
Route::get('/mahasiswaexpo', [MahasiswaController::class, 'exportz']);
//Route::post('/mahasiswaimport',[MahasiswaController::class, 'import'])->name('mahasiswa.import');
Route::post('/mahasiswaimport', [MahasiswaController::class, 'import']);

//Bagian Mic
//Chief Mentor
Route::get('/listChief', [ChiefMentorController::class, 'index']);
Route::get('/getMahasiswa',[ChiefMentorController::class, 'get']);
Route::post('/listChief/store', [ChiefMentorController::class, 'store']);
Route::delete('/listChief/delete/{id}', [ChiefMentorController::class, 'delete']);
Route::post('/listChief/update', [ChiefMentorController::class, 'update']);
//Mentor
Route::get('/listMentor', [MentorController::class, 'index']);
Route::get('/mentorcr', [MentorController::class, 'create']);
Route::post('/mentorstore', [MentorController::class, 'store']);
Route::get('/mentoredit{id}', [MentorController::class, 'edit']);
Route::patch('/mentorupdate/{id}', [MentorController::class, 'update']);
Route::delete('/listMentor/delete/{id}', [MentorController::class, 'delete']);
//Data Karyawan
Route::get('/listKaryawan', [DataKaryawanController::class, 'index']);
Route::post('/listKaryawan/store', [DataKaryawanController::class, 'store']);
Route::delete('/listKaryawan/delete/{id}', [DataKaryawanController::class, 'delete']);
Route::post('/listKaryawan/update', [DataKaryawanController::class, 'update']);
//Data Dosen
Route::get('/listDosen', [DataDosenController::class, 'index']);
Route::post('/listDosen/store', [DataDosenController::class, 'store']);
Route::delete('/listDosen/delete/{id}', [DataDosenController::class, 'delete']);
Route::post('/listDosen/update', [DataDosenController::class, 'update']);

//Bagian Can
//Jadwal
Route::get('/listJadwal',[Controllers\JadwalController::class, 'index']);
Route::post('/listJadwal/store',[Controllers\JadwalController::class, 'store']);
Route::post('/listJadwal/update',[Controllers\JadwalController::class, 'update']);
Route::delete('/listJadwal/delete/{id}',[Controllers\JadwalController::class, 'delete']);
//KelompokController
Route::get('/listKelompok',[Controllers\KelompokController::class, 'index']);
Route::get('/getKelompok',[Controllers\KelompokController::class, 'get']);
Route::post('/listKelompok/store',[Controllers\KelompokController::class, 'store']);
Route::post('/listKelompok/update',[Controllers\KelompokController::class, 'update']);
Route::delete('/listKelompok/delete/{id}',[Controllers\KelompokController::class, 'delete']);

require __DIR__ . '/auth.php';
