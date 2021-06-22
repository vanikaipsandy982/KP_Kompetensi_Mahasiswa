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
                        @if($data2->id_survey == $data->id)
                <tr>
                    <td scope="col">{{$data2->nomor}}</td>
                    <td scope="col">{{$data2->question}}</td>
                    <td scope="col">{{$data2->skor_kemampuan}}</td>
                    <td scope="col">{{$data2->skor_kepuasan}}</td>
                    <td scope="col">{{$data2->selisih}}</td>
                    <td scope="col">{{$data2->keterangan}}</td>
                </tr>
                        @endif
                    @endforeach
                <tr>
                    <td scope="col"></td>
                    <td scope="col" ><b>RATA RATA</b> </td>
                    <td scope="col" colspan="4">{{$data2->rata_rata}}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-12">
                <a type="button" class="btn btn-outline-success" href="/hasilsurveyExport">Export to Excel</a>
            </div>

</div>
</section>
@endsection

