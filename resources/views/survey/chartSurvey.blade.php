@extends('layouts.main')

@section('title', 'Hasil Survey')

@section('container')

<!-- ======= Hero Section ======= -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="gallery">
    <div class="container" data-aos="fade-up">
        <!--pertanyaan 1-->
        <div class="section-title">
            <h1>ASESMEN KEPUASAN
                PENGEMBANGAN DIRI MAHASISWA
            </h1>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // <block:setup:1>
                const data = {
                    labels: [
                        'Eating',
                        'Drinking',
                        'Sleeping',
                        'Designing',
                        'Coding',
                        'Cycling',
                        'Running'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [65, 59, 90, 81, 56, 55, 40],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }, {
                        label: 'My Second Dataset',
                        data: [28, 48, 40, 19, 96, 27, 100],
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
            <table class="table table-striped lnr-text-align-left">
                <thead>
                <tr>
                    <th scope="col">Kategori</th>
                    <th scope="col">Rata-Rata Kemampuan</th>
                    <th scope="col">Rata-Rata Kepuasan</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pertanyaan->unique('survey_name') as $data)
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

                    <tr>
                        <td scope="col" >{{$data->survey_name}}</td>
                        <td scope="col"class="text-center">{{round($sumRatKem/$counting,1)}}</td>
                        <td scope="col" class="text-center">{{round($sumRatKep/$counting,1)}}</td>

                    </tr>
                    <p hidden>{{$sumRatKem=0}}</p>
                    <p hidden>{{$counting=0}}</p>
                    <p hidden>{{$sumRatKep=0}}</p>
                @endforeach
                </tbody>
            </table>
        </div>

</section>

@endsection

