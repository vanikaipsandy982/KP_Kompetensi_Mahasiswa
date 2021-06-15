@extends('layouts.main')

@section('title', 'Data Dosen')


<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalDataDosen">Tambah Dosen</button>
                    @endif
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Jenis Kelamin</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                        @foreach($data_dosen as $data)
                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$data->id_karyawan}}</td>
                                <td>{{$data->nama_karyawan}}</td>
                                <td>{{$data->email_karyawan}}</td>
                                <td>{{$data->tgl_lahir}}</td>
                                <td>{{$data->alamat_karyawan}}</td>
                                <td>{{$data->notelp_karyawan}}</td>
                                <td>{{$data->agama}}</td>
                                <td>{{$data->jeniskelamin_karyawan}}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                                <td>
                                    <button type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#editDosen">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                </td>
                                @endif
                            </tr>
                            @php($count +=1 )
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Form Tambah Dosen-->
    <div class="modal fade" id="modalDataDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!--NIK-->
                        <div class="form-group">
                            <label for="id_dosen">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" maxlength="3">
                        </div>
                        <!--nama_dosen-->
                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" class="form-control" placeholder="Nama Dosen">
                        </div>
                        <!--email_dosen-->
                        <div class="form-group">
                            <label for="email_dosen">Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <!--tgl lahir-->
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control">
                        </div>
                        <!--notelp dosen-->
                        <div class="form-group">
                            <label for="notelp_dosen">No Telepon</label>
                            <input type="tel" class="form-control">
                        </div>
                        <!--agama-->
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="agama" class="form-control" placeholder="Agama">
                        </div>
                        <!--Jenis Kelamin-->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <input type="radio" value="Laki-Laki" id="laki" name="laki">
                            <label for="laki">Laki-Laki</label><br>
                            <input type="radio" value="Perempuan" id="perempuan" name="perempuan">
                            <label for="perempuan">Perempuan</label><br>
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

    <!--Form edit Dosen-->
    <div class="modal fade" id="editDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!--NIK-->
                        <div class="form-group">
                            <label for="id_karyawan">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" maxlength="3">
                        </div>
                        <!--nama_karyawan-->
                        <div class="form-group">
                            <label for="nama_karyawan">Nama Karyawan</label>
                            <input type="text" class="form-control" placeholder="Nama Karyawan">
                        </div>
                        <!--email_karyawan-->
                        <div class="form-group">
                            <label for="email_karyawan">Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <!--tgl lahir-->
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control">
                        </div>
                        <!--notelp karyawan-->
                        <div class="form-group">
                            <label for="notelp_karyawan">No Telepon</label>
                            <input type="tel" class="form-control">
                        </div>
                        <!--agama-->
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="agama" class="form-control" placeholder="Agama">
                        </div>
                        <!--Jenis Kelamin-->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <input type="radio" value="Laki-Laki" id="laki" name="laki">
                            <label for="laki">Laki-Laki</label><br>
                            <input type="radio" value="Perempuan" id="perempuan" name="perempuan">
                            <label for="perempuan">Perempuan</label><br>
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
