@extends('layouts.main')

@section('title', 'Edit Data Program Studi')

@section('container')
<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                <h1>Edit Data Program Studi</h1>
                <br>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{session('message')}}
                    </div>
                @endif
                <form method="post" action="/prodiupdate/{{$prod->id}}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fakul_prodi">Fakultas</label>
                                <select class="form-select" name="selected_fakultas_prodi_baru">
                                    @foreach($fkl as $data)
                                        <option style="display: none" value="{{$data->FakultasID}}" selected>{{$data->nama_fakultas}}</option>
                                    @endforeach
                                    @foreach($fakultas as $data)
                                        <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_prod">Kode Prodi</label>
                                <input type="text" class="form-control" @error('id_prodi') is-invalid @enderror value="{{$prod->id_prodi}}" name="kode_prodi_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_prod">Nama Prodi</label>
                                <input type="text" class="form-control" @error('nama_prodi') is-invalid @enderror value="{{$prod->nama_prodi}}" name="nama_prodi_baru" required>
                            </div>
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
@endsection
