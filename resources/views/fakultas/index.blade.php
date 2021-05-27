@extends('layouts.main')

@section('title', 'Data Fakultas')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahFakultas">Tambah Fakultas</button>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">70</th>
                            <td>Teknologi Informasi</td>
                            <td>
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEditFakultas">Edit</button>
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--Form Tambah Fakultas-->
<div class="modal fade" id="modalTambahFakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <!--Kode Fakultas-->
                    <div class="form-group">
                        <label for="kode_fakultas">Kode Fakultas</label>
                        <input type="text" class="form-control" placeholder="Kode Fakultas" maxlength="3">
                    </div>
                    <!--Nama Fakultas-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Fakultas</label>
                        <input type="text" class="form-control" placeholder="Nama Fakultas">
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
<!--Form Edit Fakultas-->
<div class="modal fade" id="modalEditFakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <!--Kode Fakultas-->
                    <div class="form-group">
                        <label for="kode_fakultas">Kode Fakultas</label>
                        <input type="text" class="form-control" placeholder="Kode Fakultas" maxlength="3">
                    </div>
                    <!--Nama Fakultas-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Fakultas</label>
                        <input type="text" class="form-control" placeholder="Nama Fakultas">
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
@endsection
