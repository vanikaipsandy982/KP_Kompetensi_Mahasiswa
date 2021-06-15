@extends('layouts.main')

@section('title', 'Data Fakultas')

@section('container')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahFakultas">Tambah Fakultas</button>
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
{{--                            <th scope="col">ID</th>--}}
                            <th scope="col">Nama Fakultas</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php($count = 1)
                        @foreach($fakultas->sortby('id') as $data)
                            <tr>
                                <th>{{$count}}</th>
{{--                                <th>{{$data->id}}</th>--}}
                                <td>{{$data->nama_fakultas}}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                                <td>
                                    <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>
                                    <form method="post" action="{{ url('/listFakultas/delete/'.$data->id) }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @php($count += 1)
                        @endforeach
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
                <form method="POST" action="{{ url('/listFakultas/store') }}">
                @csrf
                <!--Nama Fakultas-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Fakultas</label>
                        <input type="text" class="form-control" placeholder="Nama Fakultas" name="namaFakultas" required>
                    </div>
                    @error('namaFakultas')
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
<!--Form Edit Fakultas-->
<div class="modal fade" id="modalEditFakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/listFakultas/update') }}">
                @csrf
                    <input type="hidden" id="hiddenEditFakultas" name="namaFakultasEdit">
                    <!--Nama Fakultas-->
                    <div class="form-group">
                        <label for="nama_fakultas">Nama Fakultas</label>
                        <input type="text" class="form-control" value="{{$data->nama_fakultas}}" name="namaFakultasBaru">
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
            $('#hiddenEditFakultas').val(id[2]);
            var fakultasLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(2)`).html();
            $('input[name="namaFakultasBaru"]').val(fakultasLama);
            console.log(fakultasLama);
            $('#modalEditFakultas').modal('toggle');
        });
    });
</script>
@endsection
