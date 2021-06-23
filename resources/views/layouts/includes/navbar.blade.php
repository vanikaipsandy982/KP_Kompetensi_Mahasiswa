<!-- ======= Header ======= -->
<header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="/home">MCUCare</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/home">Home</a></li>
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/listFakultas">Fakultas</a></li>
                        <li><a href="/listProdi">Program Studi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Mentoring</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/listChief">Data Chief Mentor</a></li>
                        <li><a href="/listJadwal">Jadwal Mentoring</a></li>
                        <li><a href="/listKelompok">Kelompok(Family-Cell)</a></li>
                    </ul>
                </li>
                <li  class="dropdown" ><a href="#"><span>Data</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/listMahasiswa">Data Mahasiswa</a></li>
                        <li><a href="/listDosen">Data Dosen</a></li>
                        <li><a href="/listKaryawan">Data Karyawan</a></li>
                    </ul>
                </li>
                @endif
                <li class="dropdown"><a href="#"><span>Survey</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/isiSurvey">Isi Survey</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <li><a href="/hasilsurvey">Hasil Survey</a></li>
                        <li><a href="/editSurvey">Edit Survey</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>NIK/NRP</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/userProfile">Profile</a></li>
                        <li>
                            <form action="{{url('/logout')}}" method="post">
                                @csrf
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-danger">Logout</button>
{{--                                <input type="submit" class="bi bi-chevron-down" value="Logout"/></input>--}}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
