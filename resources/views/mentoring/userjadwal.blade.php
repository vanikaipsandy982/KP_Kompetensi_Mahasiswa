@extends('layouts.main')

@section('title', 'Jadwal Mentoring')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID Kelompok</th>
                            <th scope="col">Jadwal Mentoring</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">ID Mentor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jadwal_mentoring as $data)
                            <tr>
                                <th scope="row">{{$data->fk_id_kelompok}}</th>
                                <td>{{$data->jadwal}}</td>
                                <td>{{$data->catatan}}</td>
                                <td>{{$data->fk_id_mahasiswa}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
