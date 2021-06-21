@extends('layouts.main')

@section('title', 'Isi Survey')
@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div>
                    <h1>MCU Care Survey</h1>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Fakultas</label>
                            <select class="form-select " aria-label="Default select example">
                                <option selected>Pilih Fakultas</option>
                                @foreach($fakultas as $data)
                                <option>{{$data->nama_fakultas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Program Studi</label>
                            <select class="form-select " aria-label="Default select example">
                                <option selected>Pilih Program Studi</option>
                                @foreach($prodi as $data)
                                <option>{{$data->nama_prodi}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12">
                            <a href="/category_survey" class="btn btn-light" role="button" aria-pressed="true">Isi Survey</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
@endsection
