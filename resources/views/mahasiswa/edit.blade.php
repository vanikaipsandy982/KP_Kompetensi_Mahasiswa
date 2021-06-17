@extends('layouts.main')

@section('title', 'Edit Data Mahasiswa')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <h1>Edit Data Mahasiswa</h1>
                    <br>
                    <form method="post" action="/mahasiswaupdate">
                        @csrf
                        @method('patch')
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
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio1" value="perempuan" checked>
                                    <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio2" value="laki">
                                    <label class="form-check-label" for="inlineRadio2">Laki-Laki</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal_masuk_mhs">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tanggal_masuk_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="email_mhs">Email</label>
                                <input type="text" class="form-control" placeholder="Email Mahasiswa" name="email_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="telp_mhs">Telepon</label>
                                <input type="text" class="form-control" placeholder="Telepon Mahasiswa" name="telp_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ortu">Nama Orang Tua</label>
                                <input type="text" class="form-control" placeholder="Nama Orang Tua Mahasiswa" name="ortu_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Orang Tua</label>
                                <textarea class="form-control" name="alamat_ortu_mahasiswa_baru" placeholder="Alamat Lengkap Orang Tua Mahasiswa" required></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
                                </div>
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
