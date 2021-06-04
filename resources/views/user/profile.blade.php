@extends('layouts.main')

@section('title', 'Profile')

@section('container')

<link href="assets/css/detail.css" rel="stylesheet">

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Profile</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">NRP/NIK</label>
                                    <input disabled name="nrpMahasiswa" id="idStudent" type="text" class="form-control" value="1872000">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Nama Lengkap</label>
                                    <input disabled name="namaLengkap" id="fullName" type="text" class="form-control" value="Nama Lengkap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
