@extends('layouts.main')

@section('title', 'Hasil Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="section-title">
        <h1>ASESMEN KEPUASAN
            PENGEMBANGAN DIRI MAHASISWA
        </h1>
    </div>
    <div class="" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">

                <table class="table lnr-text-align-left">
                    <thead>
                    <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-center">Rata-Rata Kemampuan</th>
                        <th scope="col" class="text-center">Rata-Rata Kepuasan</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pertanyaan->unique('survey_name') as $data)
                        <tr>
                            <th scope="col" >{{$data->survey_name}}</th>

                            @foreach($pertanyaan as $data2)
                                @if($data2->fk_id_survey == $data->id)

                                    <p hidden>{{$sumRatKem+=$data2->skor_kemampuan}}</p>
                                    <p hidden>{{$sumRatKep+=$data2->skor_kepuasan}}</p>
                                    <p hidden>{{$counting++}}</p>
                                @endif
                            @endforeach
                            <p hidden>{{$sumRatKem}}</p>
                            <p hidden>{{$sumRatKep}}</p>
                            <p hidden>counting: {{$counting}}</p>
                            <p hidden>rata rata {{$sumRatKem/$counting}}</p>
                            <p hidden>rata rata {{$tampungRataRataKem[$hitung]= round($sumRatKem/$counting,1)}}</p>
                            <p hidden>rata rata kem {{print_r($tampungRataRataKem)}}</p>
                            <p hidden>rata rata {{$tampungRataRataKep[$hitung]= round($sumRatKep/$counting,1)}}</p>
                            <p hidden>rata rata kep {{print_r($tampungRataRataKep)}}</p>
                            <p hidden>rata rata {{$hitung++}}</p>


                            <td scope="col" class="text-center" >{{round($sumRatKem/$counting,1)}}</td>
                            <td scope="col" class="text-center">{{round($sumRatKep/$counting,1)}}</td>
                            <td scope="col" colspan="2" ></td>
                        </tr>
                        <p hidden>{{$sumRatKem=0}}</p>
                        <p hidden>{{$counting=0}}</p>
                        <p hidden>{{$sumRatKep=0}}</p>

                    @endforeach
                    </tbody>
                </table>
                <a type="button" class="btn btn-outline-success" href="/hasilsurvey">Lihat Detail Hasil Survey</a>
            </div>
            <div class="col-3 align-content-center">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // <block:setup:1>
                    const data = {
                        labels: [
                            'DEVELOPING COMPETENCE',
                            'MANAGING EMOTION',
                            'MOVING THROUGH AUTONOMY TOWARD INTERDEPENCY',
                            'DEVELOPING MATURE INTERPERSONAL RELATIONSHIP',
                            'ESTABLISHING IDENTITY',
                            'DEVELOPING PURPOSE',
                            'DEVELOPING INTEGRITY'
                        ],
                        datasets: [{
                            label: 'Skor Asesmen Kemampuan',
                            data: [
                                @for($x = 0; $x < 7; $x++)
                                    {{$tampungRataRataKep[$x]}},
                                @endfor
                            ]
                            // data: [65, 59, 90, 81, 56, 55, 40],
                            ,
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'Skor Asesmen Kepuasan',
                            data: [
                                @for($x = 0; $x < 7; $x++)
                                    {{$tampungRataRataKem[$x]}},
                                @endfor
                            ],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    };
                    // </block:setup>

                    // <block:config:0>
                    const config = {
                        type: 'radar',
                        data: data,
                        options: {
                            elements: {
                                line: {
                                    borderWidth: 3
                                }
                            }
                        },
                    };

                    // </block:config>

                    module.exports = {
                        actions: [],
                        config: config,
                    };
                </script>
                <script>
                    // === include 'setup' then 'config' above ===

                    var myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>
            </div>
            <div class="col-3"></div>

        </div>
    </div>

</section>

@endsection

