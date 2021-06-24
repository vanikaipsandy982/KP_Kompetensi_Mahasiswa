@extends('layouts.main')

@section('title', 'Isi Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="container" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="section-title">
            <form method="post" action="{{url("/savehasilsurvey")}}">
                {{ csrf_field() }}
            @foreach($detSurvey as $key_detail=>$detail)
                    <h1>{{$detail}}</h1>
                @foreach($catpertanyaan as $datacategory)
                    <h2>{{$datacategory->survey_name}}</h2>
                    @foreach($datacategory->survey_surveyquestion as $data)
                        <p style="font-size: 30px" >{{$data->question}}</p>
                        @for($i=1; $i<=10; $i++)
                            <div class="form-check form-check-inline">
                                <input  class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"
                                       name="inlineRadioOptions_{{$data->id}}_{{$key_detail}}_{{$datacategory->id}}" id="inlineRadio1" value="{{$i}}" required>
                                <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                            </div>
                        @endfor
                        <hr>
                    @endforeach
                        <hr>
                @endforeach
            @endforeach

{{--                <p>{{$tapung}}</p>--}}

{{--            @foreach($pertanyaan as $data)--}}
{{--                @if($data->id_survey == 1)--}}
{{--            <p style="font-size: 30px" >{{$data->question}}</p>--}}
{{--                @for($i=1; $i<=10; $i++)--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input @error('inlineRadioOptions') is-invalid @enderror" type="radio"--}}
{{--                           name="inlineRadioOptions{{$data->id}}[]" id="inlineRadio1" value="{{$i}}">--}}
{{--                        <label class="form-check-label" for="inlineRadio1">{{$i}}</label>--}}
{{--                    </div>--}}
{{--                @endfor--}}

{{--                @error('inlineRadioOptions')--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{$massage}}--}}
{{--                    </div>--}}
{{--                @enderror--}}
{{--                <hr>--}}
{{--                @endif--}}
{{--        @endforeach--}}
                <button type="submit" class="btn btn-danger">submit</button>
            </form>
{{--            <div class="col-12">--}}
{{--                <a href="/surveyCat2" class="btn btn-light" role="button" aria-pressed="true">Isi Survey</a>--}}
{{--            </div>--}}
    </div>
    </div>
</section>
@endsection

