@extends('layouts.main')

@section('title', 'Tambah Data Mentor')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <h1>Tambah Data Mentor</h1>
                    <br>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('message')}}
                        </div>
                    @endif
                    <form method="post" action="/mentorstore">
                        @csrf
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nrp_mhs">NRP</label>
                                <input type="text" class="form-control" placeholder="NRP Mahasiswa" name="nrp_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_mhs">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap Mahasiswa" name="nama_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="fakul_mahasiswa">Fakultas</label>
                                <select class="form-select" name="selected_fakultas_mahasiswa_baru">
                                    <option disabled selected>Pilih Fakultas</option>
                                    @foreach($fakultas as $data)
                                        <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prodi_mahasiswa">Program Studi</label>
                                <select class="form-select" name="selected_prodi_mahasiswa_baru">
                                    <option disabled selected>Pilih Program Studi</option>
                                    @foreach($prodi as $data2)
                                        <option value="{{$data2->id}}">{{$data2->nama_prodi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_mhs">Alamat Mahasiswa</label>
                                <textarea class="form-control" name="alamat_mahasiswa_baru" placeholder="Alamat Lengkap Mahasiswa" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama_chief_baru">Chief Mentor</label>
                                <select class="form-select" name="nama_chief_baru">
                                    <option disabled selected>Chief Mentor</option>
                                    @foreach($data_karyawan as $data3)
                                        <option value="{{$data3->id}}">{{$data3->nama_karyawan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio1" value="Wanita" checked>
                                    <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio2" value="Pria">
                                    <label class="form-check-label" for="inlineRadio2">Pria</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email_mhs">Email</label>
                                <input type="email" class="form-control" placeholder="Email Mahasiswa" name="email_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="telp_mhs">Telepon</label>
                                <input type="text" class="form-control" placeholder="Telepon Mahasiswa" name="telp_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_masuk_mhs">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tanggal_masuk_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ortu">Nama Orang Tua</label>
                                <input type="text" class="form-control" placeholder="Nama Orang Tua Mahasiswa" name="ortu_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Orang Tua</label>
                                <textarea class="form-control" name="alamat_ortu_mahasiswa_baru" placeholder="Alamat Lengkap Orang Tua Mahasiswa" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kelompok_baru">Kelompok</label>
                                <select class="form-select" name="kelompok_baru">
                                    <option disabled selected>Kelompok</option>
                                    @foreach($kelompok as $data4)
                                        <option value="{{$data4->id}}">{{$data4->nama_kelompok}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">Batal</a>
                                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
