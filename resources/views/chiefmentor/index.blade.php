@extends('layouts.main')

@section('title', 'Data Chief Mentor')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahChiefMentor">Tambah Chief Mentor</button>
                    <br><br>
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
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editChief">Edit</button>
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
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
                    <form>
                        <!--Catatan-->
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" placeholder="Catatan">
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
