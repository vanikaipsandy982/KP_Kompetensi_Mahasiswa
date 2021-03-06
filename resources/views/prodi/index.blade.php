@extends('layouts.main')

@section('title', 'Data Program Studi')

@section('container')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahProdi">Tambah Program Studi</button>
                @endif
                <br><br>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{session('message')}}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Program Studi</th>
                        <th scope="col">Fakultas</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <th scope="col">Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faculty as $prod)
                    <tr>
                        <td>{{$prod->id_prodi}}</td>
                        <td>{{$prod->nama_prodi}}</td>
                        <td>{{$prod->nama_fakultas}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <td>
                            <a href="/prodiedit{{$prod->id}}" class="btn btn-outline-info">Edit</a>
                            <form method="post" action="{{ url('/listProdi/delete/'.$prod->id) }}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                            </form>
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
<!--Form Tambah Program Studi-->
<div class="modal fade" id="modalTambahProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/listProdi/store') }}">
                    @csrf
                    <input type="hidden" id="hiddenEditFakultas" name="namaProdiEdit">
                    <!--Pilih Fakultas-->
                    <div class="form-group">
                        <label for="prodi_mhs">Fakultas</label>
                        <select class="form-select" name="selectedFakultas">
                            <option disabled selected>Pilih Fakultas</option>
                            @foreach($fakultas as $data)
                                <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Kode Program Studi-->
                    <div class="form-group">
                        <label for="kode_prodi">Kode Program Studi</label>
                        <input type="text" class="form-control" placeholder="Kode Program Studi" maxlength="3" name="kodeProdi" required>
                    </div>
                    <!--Nama Program Studi-->
                    <div class="form-group">
                        <label for="nama_prodi">Nama Program Studi</label>
                        <input type="text" class="form-control" placeholder="Nama Program Studi" name="namaProdi" required>
                    </div>
                    <!--Button Simpan-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
