@extends('layouts.main')

@section('title', 'Data Program Studi')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahProdi">Tambah Program Studi</button>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Program Studi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>72</th>
                            <td>Teknik Informatika</td>
                            <td>
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEditProdi">Edit</button>
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
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
                <form>
                    <!--Pilih Fakultas-->
                    <div class="form-group">
                        <label for="fakultas_mhs">Fakultas</label>
                        <select class="form-select">
                            <option selected>Pilih Fakultas</option>
                            <option value="1">Teknologi Informasi</option>
                            <option value="2">Kedokteran</option>
                        </select>
                    </div>
                    <!--Kode Program Studi-->
                    <div class="form-group">
                        <label for="kode_fakultas">Kode Program Studi</label>
                        <input type="text" class="form-control" placeholder="Kode Program Studi" maxlength="3">
                    </div>
                    <!--Nama Program Studi-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Program Studi</label>
                        <input type="text" class="form-control" placeholder="Nama Program Studi">
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
<!--Form Edit Program Studi-->
<div class="modal fade" id="modalEditProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <!--Pilih Fakultas-->
                    <div class="form-group">
                        <label for="fakultas_mhs">Fakultas</label>
                        <select class="form-select">
                            <option selected>Pilih Fakultas</option>
                            <option value="1">Teknologi Informasi</option>
                            <option value="2">Kedokteran</option>
                        </select>
                    </div>
                    <!--Kode Program Studi-->
                    <div class="form-group">
                        <label for="kode_fakultas">Kode Program Studi</label>
                        <input type="text" class="form-control" placeholder="Kode Program Studi" maxlength="3">
                    </div>
                    <!--Nama Program Studi-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Program Studi</label>
                        <input type="text" class="form-control" placeholder="Nama Program Studi">
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
