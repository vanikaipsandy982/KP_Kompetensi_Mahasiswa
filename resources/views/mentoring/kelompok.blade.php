@extends('layouts.main')

@section('title', 'Kelompok')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahKelompok">Tambah Kelompok</button>
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
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelompok</th>
                            <th scope="col">ID Mentor</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                        @foreach($pengelompokan->sortby('id') as $data)
                            <tr>
                                <th scope="row">{{$count}}</th>
                                <th scope="row">{{$data->nama_kelompok}}</th>
                                <td>{{$data->fk_id_chief_mentor}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>

                                    <form method="post" action="{{ url('/listKelompok/delete/'.$data->id) }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php($count +=1)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Form Tambah Kelompok-->
    <div class="modal fade" id="modalTambahKelompok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/listKelompok/store')}}">
                    @csrf
                        <div class="form-group">
                            <label for="nama_kelompok">Nama Kelompok</label>
                            <input type="text" class="form-control" placeholder="Nama Kelompok" name="namaKelompok">
                        </div>
                        <div class="form-group">
                            <label for="id_mentor">ID Mentor</label>
                            <select class="form-control" name="fk_chiefMentor">
                                <option></option>
                                @foreach($chief_mentor as $value)
                                    <option value="{{$value->id}}">{{$value->id}}</option>
                                @endforeach
                            </select>
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

<!--Form Edit Kelompok-->
<div class="modal fade" id="editKelompok" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Edit Kelompok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/listKelompok/update') }}">
                    @csrf
                    <input type="hidden" id="editModal" name="editKelompok">
                    <!--Catatan-->
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" class="form-control" name="kelompokBaru">
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
