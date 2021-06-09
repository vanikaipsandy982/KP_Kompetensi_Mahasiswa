@extends('layouts.main')

@section('title', 'Data Chief Mentor')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahChiefMentor">Tambah Chief Mentor</button>
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
                            <th scope="col">ID</th>
                            <th scope="col">Catatan Mentor</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chief_mentor as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->catatan_mentor}}</td>
                            <td>
                                    <button type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#editChief">Edit</button>

                                <form method="post" action="{{ url('/listChief/delete/'.$data->id) }}" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!--Form Tambah Chief-->
    <div class="modal fade" id="modalTambahChiefMentor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Catatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/listChief/store') }}">
                        @csrf
                        <!--Catatan-->
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" placeholder="Catatan" name="catatanMentor">
                        </div>
                            @error('catatanMentor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <!--Button Simpan-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--Form Edit Chief-->
    <div class="modal fade" id="editChief" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit">Edit Catatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/listChief/update/'.$data->id) }}">
                        @method('put')
                        @csrf
                        <!--Catatan-->
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" value="{{$data->catatan_mentor}}" name="catatanMentorBaru">
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
