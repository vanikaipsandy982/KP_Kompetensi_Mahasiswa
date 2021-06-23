@extends('layouts.main')

@section('title', 'Update Data Pertanyaan')

@section('container')

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                        <form method="post" action="/update/{{$sry->id}}{{$sry->fk_id_survey}}">
                            @csrf
                            @method('patch')
                    <div class="col-sm-12">
                        <br><br>
                        @foreach($judul as $data)
                            <h1>{{$data->survey_name}}</h1>

                        @endforeach

                    </div>
                    <div class="col-sm-12">

                        @foreach($updatePertanyaan as $data)
                            <div class="form-group">
                                <label for="nrp_mhs">Ubah Pertanyaan</label>
                                <input type="text" class="form-control" @error('question') is-invalid @enderror value="{{$data->question}}" name="txtquestion" required>
                            </div>


                        @endforeach
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ url()->previous() }}"  class="btn btn-secondary btn-lg">Batal</a>
                                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                            </div>
                    </div>
                        </form>
                </div>
            </div>


        </div>


    </section>
@endsection
