<!-- ======= Header ======= -->
<header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="/home">MCUCare</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/home">Home</a></li>
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                            \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/listFakultas">Fakultas</a></li>
                        <li><a href="/listProdi">Program Studi</a></li>
                    </ul>
                </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                    \Illuminate\Support\Facades\Auth::user()->userRole->name=='mentor' or
                    \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                <li class="dropdown"><a href="#"><span>Mentoring</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/listChief">Data Chief Mentor</a></li>
                        <li><a href="/listMentor">Data Mentor</a></li>
                        <li><a href="/listJadwal">Jadwal Mentoring</a></li>
                        <li><a href="/listKelompok">Kelompok(Family-Cell)</a></li>
                    </ul>
                </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                            \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                <li  class="dropdown" ><a href="#"><span>Data</span><i class="bi bi-chevron-down"></i></a>
                    @endif
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin' or
                            \Illuminate\Support\Facades\Auth::user()->userRole->name=='dosen')
                        <li><a href="/listMahasiswa">Data Mahasiswa</a></li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <li><a href="/listDosen">Data Dosen</a></li>
                        <li><a href="/listKaryawan">Data Karyawan</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Survey</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/surveyCat">Isi Survey</a></li>
                        <li><a href="/chartSurvey">Hasil Survey</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->userRole->name=='superadmin')
                        <li><a href="/editSurvey">Edit Survey</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Halo, &nbsp;
                            {{\Illuminate\Support\Facades\Auth::user()->username}}
                        </span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li>
                            <form action="{{url('/logout')}}" method="post">
                                @csrf
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
