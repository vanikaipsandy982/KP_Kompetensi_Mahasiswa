@extends('layouts.main')

@section('title', 'Jadwal Mentoring')

@section('container')
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahJadwal">Tambah Jadwal Mentoring</button>
                        <br><br>
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('message')}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jadwal Mentoring</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($jadwal_mentoring->sortby('id') as $data)
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td>{{$data->jadwal}}</td>
                                    <td>{{$data->catatan}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$data->id}}">Edit</button>

                                        <form method="post" action="{{ url('/listJadwal/delete/'.$data->id) }}" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @php($count +=1 )
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Form Tambah Jadwal-->
        <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Keterangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/listJadwal/store') }}">
                        @csrf
                        <!--Keterangan-->
                            <div class="form-group">
                                <label for="keterangan">Jadwal</label>
                                <input type="text" class="form-control" placeholder="Jadwal" name="jadwal">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" placeholder="Keterangan" name="keteranganJadwal">
                            </div>
                        <!--Button Simpan-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Form Edit Jadwal-->
        <div class="modal fade" id="editJadwal" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEdit">Edit Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/listJadwal/update') }}">
                            @csrf
                            <input type="hidden" id="editModal" name="jadwalEdit">
                            <!--Jadwal-->
                            <div class="form-group">
                                <label for="catatan">Jadwal Mentoring</label>
                                <input type="text" class="form-control" name="jadwalBaru">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Keterangan</label>
                                <input type="text" class="form-control" name="keteranganBaru">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Nama Mentor</label>
                                <input type="text" class="form-control" name="mentorBaru">
                            </div>

                            <!--Button Simpan-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">>
        $(document).ready(function (){
            $('.btn-edit').on('click',function (){
                var id = $(this).attr('id').split('-');
                $('#editModal').val(id[2]);
                var keteranganLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(3)`).html();
                var jadwalLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(2)`).html();
                $('input[name="keteranganBaru"]').val(keteranganLama);
                $('input[name="jadwalBaru"]').val(jadwalLama);
                console.log(jadwalLama);
                console.log(keteranganLama);
                $('#editJadwal').modal('toggle');
            });
        });
    </script>

@endsection
