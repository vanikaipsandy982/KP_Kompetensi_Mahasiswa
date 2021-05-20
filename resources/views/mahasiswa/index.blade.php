@extends('layouts.main')

@section('title', 'Data Mahasiswa')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-primary">Tambah Mahasiswa</button>
                <button type="button" class="btn btn-outline-success">Export</button>
                <button type="button" class="btn btn-outline-warning">Import</button>
                <br><br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Depan</th>
                        <th scope="col">Nama Belakang</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Teknik Informatika</td>
                        <td>
                            <button type="button" class="btn btn-outline-info">Edit</button>
                            <button type="button" class="btn btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Teknik Informatika</td>
                        <td>
                            <button type="button" class="btn btn-outline-info">Edit</button>
                            <button type="button" class="btn btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Sistem Informasi</td>
                        <td>
                            <button type="button" class="btn btn-outline-info">Edit</button>
                            <button type="button" class="btn btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
