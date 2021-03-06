@extends('layouts.main')

@section('title', 'Data Mentor')

@section('container')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div >
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                    <a type="button" class="btn btn-outline-primary" href='/mentorcr'>Tambah Mentor</a>
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
                        <th>Nama Chief Mentor</th>
                        <th>Kelompok</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mahasiswaMentor->sortby('id') as $mhs)
                    <tr>
                        <td>{{$mhs->nrp}}</td>
                        <td>{{$mhs->nama_mahasiswa}}</td>
                        <td>{{$mhs->mahasiswaProdi->prodiFakultas->nama_fakultas}}</td>
                        <td>{{$mhs->mahasiswaProdi->nama_prodi}}</td>
                        <td>{{$mhs->alamat_mahasiswa}}</td>
                        <td>{{$mhs->jeniskel_mahasiswa}}</td>
                        <td>{{$mhs->email_mahasiswa}}</td>
                        <td>{{$mhs->telp_mahasiswa}}</td>
                        <td>{{$mhs->tanggal_masuk}}</td>
                        <td>{{$mhs->nama_orangtua}}</td>
                        <td>{{$mhs->alamat_orangtua}}</td>
                        <td>{{$mhs->nama_chief}}</td>
                        <td>{{$mhs->mahasiswaKelompok->nama_kelompok}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <td>
                            <div class="d-grid gap-2">
                                <a href="/mentoredit{{$mhs->id}}" class="btn btn-outline-info">Edit</a>
                                <form method="post" action="{{ url('/listMentor/delete/'.$mhs->id) }}" class="d-inline">
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
@endsection
