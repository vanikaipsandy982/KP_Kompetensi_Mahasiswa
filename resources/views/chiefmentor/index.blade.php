@extends('layouts.main')

@section('title', 'Data Chief Mentor')

@section('container')

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                    <div class="col-sm-12">
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                            \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahChiefMentor">Tambah</button>
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
                                <th scope="col">Nama Chief Mentor</th>
                                <th scope="col">Catatan Mentor</th>
                                <th scope="col">Tanggal</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                                    \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($chief_mentor->sortby('id') as $data)
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td>{{$data->mentorKaryawan->nama_karyawan}}</td>
                                    <td>{{$data->catatan_mentor}}</td>
                                    <td>{{$data->created_at}}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                                    \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>
                                        <form method="post" action="{{ url('/listChief/delete/'.$data->id) }}" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-outline-info btn-detail" id="detail-{{$data->fk_id_karyawan}}">Detail</button>
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
                            <!-- nama chief mentor dari karyawan -->
                            <div class="form-group">
                                <label for="karyawan">Nama Chief Mentor</label>
                                <select class="form-control" name="karyawan">
                                    <option></option>
                                    @foreach($data_karyawan as $value)
                                        <option value="{{$value->id}}">{{$value->nama_karyawan}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                        <form method="post" action="{{ url('/listChief/update') }}">
                            @csrf
                            <input type="hidden" id="editModal" name="catatanMentorEdit">
                            <!--Catatan-->
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <input type="text" class="form-control" name="catatanMentorBaru">
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
        <!--Form Detail -->
        <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">NRP</th>
                            <th scope="col">Nama Mahasiswa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tbody id="detail-table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $('.btn-edit').on('click',function (){
                var id = $(this).attr('id').split('-');
                $('#editModal').val(id[2]);
                var catatanLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(3)`).html();
                $('input[name="catatanMentorBaru"]').val(catatanLama);
                console.log(catatanLama);
                $('#editChief').modal('toggle');
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-detail').on('click', function () {

                var type='GET';
                var formData={
                    id: $(this).attr('id').split('-').pop(),
                };
                var url='/getMahasiswa';
                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    success: function (data) {
                        $('#detail-table').empty();
                        console.log(data);
                        $.each(data,function( index, element ) {
                            $('#detail-table').append(
                                `
                             <tr>
                                <td scope="col">${element.nrp}</td>
                                <td scope="col">${element.nama_mahasiswa}</td>
                            </tr>
                            `
                            );
                        });
                        $('#modalDetail').modal('toggle');
                    },
                    error: function (data) { console.log('Error : ', data); }
                });
            });
        });
    </script>
@endsection
