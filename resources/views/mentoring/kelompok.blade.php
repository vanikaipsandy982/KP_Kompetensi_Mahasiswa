@extends('layouts.main')

@section('title', 'Kelompok')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>--}}
@endsection

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahKelompok">Tambah Kelompok</button>
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
                                    @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                                    <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>
                                    @endif

                                    <form method="post" action="{{ url('/listKelompok/delete/'.$data->id) }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                                        <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                        @endif
                                    </form>
                                        <button type="button" class="btn btn-outline-info btn-detail" id="detail-{{$data->id}}">Detail</button>
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
                    <!--Nama Kelompok-->
                    <div class="form-group">
                        <label for="namaKelompok">Nama Kelompok</label>
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

<!--Form Detail Mahasiswa-->
    <div class="modal fade" id="modalDetailKelompok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Detail Kelompok</h5>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function (){
        $('.btn-edit').on('click',function (){
            var id = $(this).attr('id').split('-');
            $('#editModal').val(id[2]);
            var kelompokLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > th:nth-child(2)`).html();
            var mentorLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(3)`).html();
            $('input[name="kelompokBaru"]').val(kelompokLama);
            $('input[name="mentorBaru"]').val(mentorLama);
            console.log(kelompokLama);
            console.log(mentorLama);
            $('#editKelompok').modal('toggle');
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
            var url='/getKelompok';
            $.ajax({
                type: type,
                url: url,
                data: formData,
                success: function (data) {
                    $('#detail-table').empty();
                    console.log(data);
                    var array = data.kelompok_mahasiswa;
                    $.each(array,function( index, element ) {
                        $('#detail-table').append(
                            `
                             <tr>
                                <td scope="col">${element.nrp}</td>
                                <td scope="col">${element.nama_mahasiswa}</td>
                            </tr>
                            `
                        );
                    });
                    $('#modalDetailKelompok').modal('toggle');
                },
                error: function (data) { console.log('Error : ', data); }
            });
        });
    });
</script>
@endsection



