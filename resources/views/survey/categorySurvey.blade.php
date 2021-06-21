@extends('layouts.main')

@section('title', 'Isi Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="container" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="section-title">
            <h1>ASESMEN KEPUASAN
                PENGEMBANGAN DIRI MAHASISWA
            </h1>
            <h2>DEVELOPING COMPETENCE</h2>
            <form method="post" action="/category_survey">
                {{ csrf_field() }}
                {{$tampung=0}}
            @foreach($pertanyaan as $data)
                @if($data->id_survey == 1)
            <p style="font-size: 30px" >{{$data->question}}</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio1" value=1>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio2" value=2>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio3" value=3>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio4" value=4>
                    <label class="form-check-label" for="inlineRadio4">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio5" value=5>
                    <label class="form-check-label" for="inlineRadio5">5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio6" value=6>
                    <label class="form-check-label" for="inlineRadio6">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio7" value=7>
                    <label class="form-check-label" for="inlineRadio7">7</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio8" value=8>
                    <label class="form-check-label" for="inlineRadio8">8</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio9" value=9>
                    <label class="form-check-label" for="inlineRadio9">9</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                           name="inlineRadioOptions{{$data->id}}" id="inlineRadio10" value=10>
                    <label class="form-check-label" for="inlineRadio10">10</label>
                </div>
{{--                @error('inlineRadioOptions')--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{$massage}}--}}
{{--                    </div>--}}
{{--                @enderror--}}
                <hr>
                @endif
        @endforeach
                <button type="submit" class="btn btn-danger">submit</button>
            </form>
{{--            <div class="col-12">--}}
{{--                <a href="/surveyCat2" class="btn btn-light" role="button" aria-pressed="true">Isi Survey</a>--}}
{{--            </div>--}}
    </div>
    </div>
</section>
@endsection

