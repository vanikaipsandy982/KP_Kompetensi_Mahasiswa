@extends('layouts.main')

@section('title', 'Kelompok')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Nama Kelompok</th>
                            <th scope="col">ID Mentor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengelompokan as $data)
                            <tr>
                                <th scope="row">{{$data->nama_kelompok}}</th>
                                <td>{{$data->fk_id_chief_mentor}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
