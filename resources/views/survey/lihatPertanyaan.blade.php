@extends('layouts.main')

@section('title', 'Tambah Data Pertanyaan')

@section('container')

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                    <div class="col-sm-12">

                        <br><br>
                        @foreach($judul as $data)
                            <h1>{{$data->survey_name}}</h1>

                        @endforeach
                        <a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahPertanyaan">Tambah Pertanyaan</a>
                        <br>
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('message')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <table class="table  ">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Pertanyaan</th>
                                <th colspan="2">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($showPertanyaan->sortby('id') as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->question}}</td>
                                    <td>
                                        <div class="d-grid gap-2">
                                            <a type="button" class="btn btn-outline-primary" href='/update_survey{{$data->nomor}}'>Edit</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-grid gap-2">
                                            <form method="post" action="{{url('/lihat_survey/delete/'.$data->nomor.$data->id)}}" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Form Tambah pertanyaan-->
        <div class="modal fade" id="modalTambahPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pertanyaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/lihat_survey/store') }}">
                            @csrf
                            @foreach($judul as $data)
                                <input hidden type="text" class="form-control" name="id" value={{$data->id}} >

                        @endforeach
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan pertanyaan" name="pertanyaan" required>
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
    <!--End Modal Tambah-->
    </section>
@endsection
