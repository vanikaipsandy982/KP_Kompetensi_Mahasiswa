@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('container')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                <a type="button" class="btn btn-outline-primary" href='/mahasiswacr'>Tambah Mahasiswa</a>
                <a type="button" class="btn btn-outline-success" href="/mahasiswaexport">Export to Excel</a>
                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#importmhs">Import</button>
                @endif
                <br><br>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{session('message')}}
                    </div>
                @endif
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th>Alamat Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Telepon Mahasiswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Orang Tua</th>
                        <th>Alamat Orang Tua</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mahasiswa->sortby('id') as $mhs)
                    <tr>
                        <td>{{$mhs->nrp}}</td>
                        <td>{{$mhs->nama_mahasiswa}}</td>
                        <td>{{$mhs->nama_fakultas}}</td>
                        <td>{{$mhs->nama_prodi}}</td>
                        <td>{{$mhs->alamat_mahasiswa}}</td>
                        <td>{{$mhs->jeniskel_mahasiswa}}</td>
                        <td>{{$mhs->email_mahasiswa}}</td>
                        <td>{{$mhs->telp_mahasiswa}}</td>
                        <td>{{$mhs->tanggal_masuk}}</td>
                        <td>{{$mhs->nama_orangtua}}</td>
                        <td>{{$mhs->alamat_orangtua}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <td>
                            <div class="d-grid gap-2">
                                <a href="/mahasiswaedit{{$mhs->id}}" class="btn btn-outline-info">Edit</a>
                                <form method="post" action="{{ url('/listMahasiswa/delete/'.$mhs->id) }}" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
<!--Form Import Mahasiswa-->
<div class="modal fade" id="importmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Import File Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/mahasiswaimport" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
