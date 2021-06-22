@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('container')

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                    <div class="col-sm-12">

                        <br><br>
                        <table class="table  ">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($showCat->sortby('id') as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->survey_name}}</td>
                                    <td>
                                        <div class="d-grid gap-2">

                                            <a type="button" class="btn btn-outline-primary" href='/lihat_survey{{$data->id}}'>Lihat pertanyaan</a>


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
    </section>
@endsection
