@extends('layouts.main')

@section('title', 'Data Program Studi')

@section('container')

<section id="hero" class="d-flex align-items-center">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambahProdi">Tambah Program Studi</button>
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
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Program Studi</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($faculty as $prod)
                    <tr>
                        <td>{{$prod->id_prodi}}</td>
                        <td>{{$prod->nama_prodi}}</td>
                        <td>{{$prod->nama_fakultas}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-info btn-edit" id="{{$count}}-edit-{{$prod->id}}">Edit</button>
                            <form method="post" action="{{ url('/listProdi/delete/'.$prod->id) }}" class="d-inline">
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
<!--Form Tambah Program Studi-->
<div class="modal fade" id="modalTambahProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/listProdi/store') }}">
                    @csrf
                    <input type="hidden" id="hiddenEditFakultas" name="namaProdiEdit">
                    <!--Pilih Fakultas-->
                    <div class="form-group">
                        <label for="prodi_mhs">Fakultas</label>
                        <select class="form-select" name="selectedFakultas">
                            <option disabled selected>Pilih Fakultas</option>
                            @foreach($fakultas as $data)
                                <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Kode Program Studi-->
                    <div class="form-group">
                        <label for="kode_prodi">Kode Program Studi</label>
                        <input type="text" class="form-control" placeholder="Kode Program Studi" maxlength="3" name="kodeProdi" required>
                    </div>
                    <!--Nama Program Studi-->
                    <div class="form-group">
                        <label for="nama_prodi">Nama Program Studi</label>
                        <input type="text" class="form-control" placeholder="Nama Program Studi" name="namaProdi" required>
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
<!--Form Edit Program Studi-->
<div class="modal fade" id="modalEditProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/listProdi/update') }}">
                    @csrf
                    <input type="hidden" id="#hiddenEditProdi" name="prodiEdit">
                    <!--Pilih Fakultas-->
                    <div class="form-group">
                        <label for="prodi_mhs">Fakultas</label>
                        <select class="form-select" name="editFakultasSelected">
                            @foreach($fakultas as $data)
                                <option value="{{$data->id}}">{{$data->nama_fakultas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Kode Program Studi-->
                    <div class="form-group">
                        <label for="kode_prodi">Kode Program Studi</label>
                        <input type="text" class="form-control" maxlength="3" value="{{$prod->id_prodi}}" name="kodeProdiBaru">
                    </div>
                    <!--Nama Program Studi-->
                    <div class="form-group">
                        <label for="nama_prodi">Nama Program Studi</label>
                        <input type="text" class="form-control" value="{{$prod->nama_prodi}}" name="namaProdiBaru">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('.btn-edit').on('click',function (){
            var id = $(this).attr('id').split('-');
            $('#hiddenEditProdi').val(id[2]);
            var kodeLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(1)`).html();
            var prodiLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(2)`).html();
            var fakulLama = $(`#hero > div.container > div > div > div > table > tbody > tr:nth-child(${id[0]}) > td:nth-child(3)`).html();
            $('input[name="kodeProdiBaru"]').val(kodeLama);
            $('input[name="namaProdiBaru"]').val(prodiLama);
            $('input[name="editFakultasSelected"]').val(fakulLama);
            console.log(kodeLama);
            console.log(prodiLama);
            console.log(fakulLama);
            $('#modalEditProdi').modal('toggle');
        });
    });
</script>
@endsection
