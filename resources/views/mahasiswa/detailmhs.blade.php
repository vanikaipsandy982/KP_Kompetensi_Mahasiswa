@extends('layouts.main')

@section('title', 'Detail Mahasiswa')

@section('container')

<link href="assets/css/detail.css" rel="stylesheet">

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Detail Mahasiswa</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="nrp_mhs">NRP</label>
                                <input disabled name="nrpMahasiswa" id="idStudent" type="text" class="form-control" value="1872000">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap</label>
                                <input disabled name="namaLengkapmhs" id="fullName" type="text" class="form-control" value="Nama Mahasiswa">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input disabled name="emailMhs" id="emailStudent" type="email" class="form-control" value="mahasiswa@domain.com">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input disabled name="noHPMhs" type="text" class="form-control" id="phoneStudent" value="081122334455">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Jenis Kelamin</label>
                                <input disabled name="jenisKelaminMhs" type="text" class="form-control" id="genderStudent" value="Perempuan">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Attend Date">Tanggal Masuk</label>
                                <input disabled name="tglMasuk" type="text" class="form-control" id="dateAttend" value="04-12-2018">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Student Faculty">Fakultas</label>
                                <input disabled name="fakultasMhs" type="text" class="form-control" id="facultyStudent" value="Teknologi Informasi">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Student Department">Program Studi</label>
                                <input disabled name="prodiMhs" type="text" class="form-control" id="departmentStudent" value="Teknik Informatika">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Address Student">Alamat Mahasiswa</label>
                                <textarea disabled name="alamatMhs" type="text" class="form-control" id="addressStudent">Jalan Sukasenang Bahagia No. 99 Bandung</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Orang Tua</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullNameParent">Nama Orang Tua</label>
                                <input disabled name="namaOrtu" id="parentName" type="text" class="form-control" value="Nama Bapack">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Address Parent">Alamat Orang Tua</label>
                                <textarea disabled name="alamatOrtu" type="text" class="form-control" id="addressParent">Jalan Sukasenang Bahagia No. 99 Bandung</textarea>
                            </div>
                        </div>
                    </div>
                    <!--Button-->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEditMahasiswa">Edit</button>
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
                                <a href="/listMhs" type="button" class="btn btn-outline-warning">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Form Edit Mahasiswa-->
    <div class="modal fade" id="modalEditMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!--NRP Mahasiswa-->
                        <div class="form-group">
                            <label for="nrp_mhs">NRP</label>
                            <input type="text" class="form-control" placeholder="NRP Mahasiswa">
                        </div>
                        <!--Nama-->
                        <div class="form-group">
                            <label for="nama_mhs">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                        <!--Jenis Kelamin-->
                        <div class="form-group">
                            <label for="jenis_kel">Jenis Kelamin</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Laki-Laki</label>
                            </div>
                        </div>
                        <!--Nomor HP Mahasiswa-->
                        <div class="form-group">
                            <label for="no_hp_mhs">Nomor Telepon Mahasiswa</label>
                            <input type="tel" class="form-control" placeholder="Nomor Telepon" maxlength="14">
                        </div>
                        <!--Email-->
                        <div class="form-group">
                            <label for="email_mhs">Email</label>
                            <input type="email" class="form-control" placeholder="Email Mahasiswa">
                        </div>
                        <!--Alamat-->
                        <div class="form-group">
                            <label for="alamat_mhs">Alamat Mahasiswa</label>
                            <textarea class="form-control" placeholder="Alamat Lengkap Mahasiswa" id="floatingTextarea2"></textarea>
                        </div>
                        <!--Fakultas-->
                        <div class="form-group">
                            <label for="fakultas_mhs">Fakultas</label>
                            <select class="form-select">
                                <option selected>Pilih Fakultas</option>
                                <option value="1">Teknologi Informasi</option>
                                <option value="2">Kedokteran</option>
                            </select>
                        </div>
                        <!--Program Studi-->
                        <div class="form-group">
                            <label for="prodi_mhs">Program Studi</label>
                            <select class="form-select">
                                <option selected>Pilih Program Studi</option>
                                <option value="1">Teknik Informatika</option>
                                <option value="2">Sistem Informasi</option>
                            </select>
                        </div>
                        <!--Tanggal Masuk-->
                        <div class="form-group">
                            <label for="tgl_msk_mhs">Tanggal Masuk</label>
                            <input type="date" class="form-control" placeholder="Email Mahasiswa">
                        </div>
                        <!--Orang Tua-->
                        <!--Nama Orangtua-->
                        <div class="form-group">
                            <label for="nama_ortu_mhs">Nama Orang Tua</label>
                            <input type="text" class="form-control" placeholder="Nama Orang Tua">
                        </div>
                        <!--Alamat Orang Tua-->
                        <div class="form-group">
                            <label for="alamat_ortu">Alamat Orang Tua</label>
                            <textarea class="form-control" placeholder="Alamat Lengkap Orang Tua" id="floatingTextarea2"></textarea>
                        </div>
                        <!--Button Simpan-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
