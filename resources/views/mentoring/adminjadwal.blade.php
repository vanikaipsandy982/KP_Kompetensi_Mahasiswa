@extends('layouts.main')

@section('title', 'Admin Jadwal Mentoring')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahJadwal">Tambah Jadwal Mentoring</button>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID Kelompok</th>
                            <th scope="col">Jadwal Mentoring</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">ID Mentor</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jadwal_mentoring as $data)
                            <tr>
                                <th scope="row">{{$data->fk_id_kelompok}}</th>
                                <td>{{$data->jadwal}}</td>
                                <td>{{$data->catatan}}</td>
                                <td>{{$data->fk_id_mahasiswa}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editJadwal">Edit</button>
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

    <!--Form Tambah Jadwal-->
    <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="keterangan">ID Kelompok</label>
                            <input type="text" class="form-control" placeholder="ID Kelompok">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Jadwal Mentoring</label>
                            <input type="text" class="form-control" placeholder="Jadwal Mentoring">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" placeholder="Keterangan">
                        </div>
                        <!--Keterangan-->
                        <div class="form-group">
                            <label for="keterangan">ID Mentor</label>
                            <input type="text" class="form-control" placeholder="ID Mentor">
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
