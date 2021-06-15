@extends('layouts.main')

@section('title', 'Data Dosen')

@section('container')
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalDataDosen">Tambah Dosen</button>
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
                                    <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>
                                    <form method="POST" action="{{ url('/listDosen/delete/'.$data->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                    </form>
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
                    <form method="POST" action="{{url('/listDosen/store')}}">
                    @csrf
                    <!--NIK-->
                        <div class="form-group">
                            <label for="idKaryawan">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" maxlength="3" name="idKaryawan">
                        </div>
                        <!--nama_karyawan-->
                        <div class="form-group">
                            <label for="namaKaryawan">Nama Karyawan</label>
                            <input type="text" class="form-control" placeholder="Nama Karyawan" name="namaKaryawan">
                        </div>
                        <!--email_karyawan-->
                        <div class="form-group">
                            <label for="emailKaryawan">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="emailKaryawan">
                        </div>
                        <!--tgl lahir-->
                        <div class="form-group">
                            <label for="tglLahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tglLahir">
                        </div>
                        <!--alamat karyawan-->
                        <div class="form-group">
                            <label for="alamatKaryawan">Alamat</label>
                            <input type="tel" class="form-control" name="alamatKaryawan">
                        </div>
                        <!--notelp karyawan-->
                        <div class="form-group">
                            <label for="notelpKaryawan">No Telepon</label>
                            <input type="tel" class="form-control" name="notelpKaryawan">
                        </div>
                        <!--agama-->
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" placeholder="Agama" name="agama">
                        </div>
                        <!--Jenis Kelamin-->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="Laki-Laki" id="laki" name="gender">
                                <label for="laki">Laki-Laki</label><br>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="Perempuan" id="perempuan" name="gender">
                                <label for="perempuan">Perempuan</label><br>
                            </div>
                        </div>
                        <!-- Jabatan -->
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" name="jabatan">
                                <option></option>
                                @foreach($jabatan as $value)
                                    <option value="{{$value->id}}">{{$value->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- user -->
                        <div class="form-group">
                            <label for="user">User</label>
                            <select class="form-control" name="user">
                                <option></option>
                                @foreach($user as $value)
                                    <option value="{{$value->id}}">{{$value->username}}</option>
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
                    <form method="post" action="{{url('/listDosen/update')}}">
                        @csrf
                        <input type="hidden" id="editModal" name="editDosen">
                        <!--NIK-->
                        <div class="form-group">
                            <label for="idKaryawanBaru">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" maxlength="3" name="idKaryawanBaru">
                        </div>
                        <!--nama_karyawan-->
                        <div class="form-group">
                            <label for="namaKaryawanBaru">Nama Karyawan</label>
                            <input type="text" class="form-control" placeholder="Nama Karyawan" name="namaKaryawanBaru">
                        </div>
                        <!--email_karyawan-->
                        <div class="form-group">
                            <label for="emailKaryawanBaru">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="emailKaryawanBaru">
                        </div>
                        <!--alamat karyawan-->
                        <div class="form-group">
                            <label for="alamatKaryawanBaru">Alamat</label>
                            <input type="tel" class="form-control" name="alamatKaryawanBaru">
                        </div>
                        <!--notelp karyawan-->
                        <div class="form-group">
                            <label for="notelpKaryawanBaru">No Telepon</label>
                            <input type="tel" class="form-control" name="notelpKaryawanBaru">
                        </div>
                        <!--agama-->
                        <div class="form-group">
                            <label for="agamaBaru">Agama</label>
                            <input type="text" class="form-control" placeholder="Agama" name="agamaBaru">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('.btn-edit').on('click',function (){
            var id = $(this).attr('id').split('-');
            $('#editModal').val(id[2]);
            var idLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(2)`).html();
            var namaLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(3)`).html();
            var emailLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(4)`).html();
            var alamatLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(6)`).html();
            var notelpLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(7)`).html();
            var agamaLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(8)`).html();
            $('input[name="idKaryawanBaru"]').val(idLama);
            $('input[name="namaKaryawanBaru"]').val(namaLama);
            $('input[name="emailKaryawanBaru"]').val(emailLama);
            $('input[name="alamatKaryawanBaru"]').val(alamatLama);
            $('input[name="notelpKaryawanBaru"]').val(notelpLama);
            $('input[name="agamaBaru"]').val(agamaLama);
            $('#editDosen').modal('toggle');
        });
    });
</script>
@endsection
