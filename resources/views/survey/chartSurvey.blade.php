@extends('layouts.main')

@section('title', 'Hasil Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="container" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="section-title">
            <h1>ANALISIS DISKREPANSI
                KEMAMPUAN & KEPUASAN
                PENGEMBANGAN DIRI MAHASISWA
            </h1>
        </div>
{{--        <p>{{$tampung}}</p>--}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Area Pengembangan</th>
                    <th scope="col">Skor Kemampuan</th>
                    <th scope="col">Skor Kepuasan</th>
                    <th scope="col">Selisih</th>
                    <th scope="col">Keterangan</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pertanyaan->unique('survey_name') as $data)
                <tr>
                    <th scope="col" colspan="6">{{$data->survey_name}}</th>
                </tr>
                    @foreach($pertanyaan as $data2)
                        @if($data2->fk_id_survey == $data->id)
                            <tr>
                                <td scope="col">{{$data2->id}}</td>
                                <td scope="col">{{$data2->question}}</td>
                                <td scope="col">{{$data2->skor_kemampuan}}</td>
                                <td scope="col">{{$data2->skor_kepuasan}}</td>
                                <td scope="col">{{$data2->selisih}}</td>
                                <td scope="col">{{$data2->skor_kepuasan}}</td>
                            </tr>
                            <p hidden>{{$sumRatKem+=$data2->skor_kemampuan}}</p>
                            <p hidden>{{$sumRatKep+=$data2->skor_kepuasan}}</p>
                            <p hidden>{{$counting++}}</p>
                        @endif
                    @endforeach
                <p hidden>{{$sumRatKem}}</p>
                <p hidden>{{$sumRatKep}}</p>
                <p hidden>counting: {{$counting}}</p>
                <p hidden>rata rata {{$sumRatKem/$counting}}</p>

                        <tr>
                            <td scope="col"></td>
                            <td scope="col" ><b>RATA RATA</b> </td>
                            <td scope="col" >{{round($sumRatKem/$counting,1)}}</td>
                            <td scope="col" >{{round($sumRatKep/$counting,1)}}</td>
                            <td scope="col" colspan="2" ></td>
                        </tr>
                <p hidden>{{$sumRatKem=0}}</p>
                <p hidden>{{$counting=0}}</p>
                <p hidden>{{$sumRatKep=0}}</p>
                @endforeach
                </tbody>
            </table>
            <div class="col-12">
                <a type="button" class="btn btn-outline-success" href="/hasilsurveyExport">Export to Excel</a>
            </div>

</div>
</section>
@endsection

