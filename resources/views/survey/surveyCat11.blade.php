@extends('layouts.main')

@section('title', 'Isi Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="container" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="section-title">
            <h1>ASESMEN KEMAMPUAN
                PENGEMBANGAN DIRI MAHASISWA
            </h1>
            <h2>DEVELOPING MATURE INTERPERSONAL RELATIONSHIP</h2>
            @foreach($pertanyaan as $data)
                @if($data->id_survey == 4)

            <p style="font-size: 30px" >{{$data->question}}</p>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                <label class="form-check-label" for="inlineRadio2">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                <label class="form-check-label" for="inlineRadio2">4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                <label class="form-check-label" for="inlineRadio2">5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
                <label class="form-check-label" for="inlineRadio2">6</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option7">
                <label class="form-check-label" for="inlineRadio2">7</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio8" value="option8">
                <label class="form-check-label" for="inlineRadio2">8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio9" value="option9">
                <label class="form-check-label" for="inlineRadio2">9</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio10" value="option10">
                <label class="form-check-label" for="inlineRadio2">10</label>
            </div>
            <hr>
                @endif
        @endforeach
            <div class="col-12">
                <a href="/surveyCat12" class="btn btn-light" role="button" aria-pressed="true">Isi Survey</a>
            </div>
    </div>
</section>
@endsection

