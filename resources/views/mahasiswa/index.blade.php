@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('container')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahMahasiswa">Tambah Mahasiswa</button>
                <button type="button" class="btn btn-outline-success">Export to Excel</button>
                <button type="button" class="btn btn-outline-warning">Import</button>
                <br><br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">NRP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1872000</td>
                        <td>Nama Mahasiswa</td>
                        <td>Teknologi Informasi</td>
                        <td>Teknik Informatika</td>
                        <td>
                            <a href="/detailMhs" class="btn btn-outline-dark">Detail</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Form Tambah Mahasiswa-->
<div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Mahasiswa</h5>
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
