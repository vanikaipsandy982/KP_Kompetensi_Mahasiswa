@extends('layouts.main')

@section('title', 'Edit Data Mentor')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <h1>Edit Data Mentor</h1>
                    <br>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('message')}}
                        </div>
                    @endif
                    <form method="post" action="/mentorupdate/{{$mhs->id}}">
                        @csrf
                        @method('patch')
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nrp_mhs">NRP</label>
                                <input type="text" class="form-control" @error('nrp') is-invalid @enderror value="{{$mhs->nrp}}" name="nrp_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_mhs">Nama Lengkap</label>
                                <input type="text" class="form-control" @error('nama_mahasiswa') is-invalid @enderror value="{{$mhs->nama_mahasiswa}}" name="nama_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="fakul_mahasiswa">Fakultas</label>
                                <select class="form-select" name="selected_fakultas_mahasiswa_baru">
                                    @foreach($mahasiswa as $data)
                                        <option style="display: none" value="{{$data->FakultasID}}" selected>{{$data->nama_fakultas}}</option>
                                    @endforeach
                                    @foreach($fakultas as $data)
                                        <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prodi_mahasiswa">Program Studi</label>
                                <select class="form-select" name="selected_prodi_mahasiswa_baru">
                                    @foreach($mahasiswa as $data2)
                                        <option style="display: none" value="{{$data2->ProdiID}}" selected>{{$data2->nama_prodi}}</option>
                                    @endforeach
                                    @foreach($prodi as $data)
                                        <option value="{{$data->id}}">{{$data->nama_prodi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_chief_baru">Chief Mentor</label>
                                <select class="form-select" name="nama_chief_baru">
                                    @foreach($mahasiswa as $data2)
                                        <option style="display: none" value="{{$data2->id}}" selected>{{$data2->nama_chief}}</option>
                                    @endforeach
                                    @foreach($data_karyawan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_karyawan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_mhs">Alamat Mahasiswa</label>
                                <textarea class="form-control" name="alamat_mahasiswa_baru" @error('alamat_mahasiswa') is-invalid @enderror required>{{$mhs->alamat_mahasiswa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio1" value="Wanita" @if($mhs->jeniskel_mahasiswa == 'Wanita') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel_mahasiswa_baru" id="inlineRadio2" value="Pria" @if($mhs->jeniskel_mahasiswa == 'Pria') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Pria</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email_mhs">Email</label>
                                <input type="email" class="form-control" @error('email_mahasiswa') is-invalid @enderror value="{{$mhs->email_mahasiswa}}" name="email_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="telp_mhs">Telepon</label>
                                <input type="text" class="form-control" @error('telp_mahasiswa') is-invalid @enderror value="{{$mhs->telp_mahasiswa}}" name="telp_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_masuk_mhs">Tanggal Masuk</label>
                                <input type="date" class="form-control" @error('tanggal_masuk') is-invalid @enderror value="{{$mhs->tanggal_masuk}}" name="tanggal_masuk_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ortu">Nama Orang Tua</label>
                                <input type="text" class="form-control" @error('nama_orangtua') is-invalid @enderror value="{{$mhs->nama_orangtua}}" name="ortu_mahasiswa_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Orang Tua</label>
                                <textarea class="form-control" name="alamat_ortu_mahasiswa_baru" @error('alamat_orangtua') is-invalid @enderror value="{{$mhs->alamat_orangtua}}" required>{{$mhs->alamat_orangtua}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="kelompok_baru">Kelompok</label>
                                <select class="form-select" name="kelompok_baru">
                                    @foreach($mahasiswa as $data2)
                                        <option style="display: none" value="{{$data2->id}}" selected>{{$data2->fk_id_kelompok}}</option>
                                    @endforeach
                                    @foreach($kelompok as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kelompok}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">Batal</a>
                                <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
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
