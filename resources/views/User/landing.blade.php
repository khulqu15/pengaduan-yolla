@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css') }}">


@endsection

@section('title', 'SIDUMAS - Sistem Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-dark">SIDUMAS</h4>
                    <p class="italic mt-0 text-dark">Sistem Pengaduan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto ">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn btn-dark" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center" style="margin-left:400px">
                        <li class="nav-item m-1">
                            <a href="#" class=><button class="btn btn-dark">Home</button></a>
                        </li>
                        <li class="nav-item m-1">
                            <a href="#tahapan"><button class="btn btn-dark">Tahapan</button></a>
                        </li>
                        <li class="nav-item m-1">
                            <a href="#tentang_kami"><button class="btn btn-dark">Tentang Kami</button></a>
                        </li>
                        <li class="nav-item m-1">
                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item m-1">
                            <a href="{{ route('pekat.formRegister') }}"
                                class="btn btn-outline-secondary text-dark">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Tampilan Carousel --}}
    <div id="carouselExampleControls" class="carousel slide ml-5" data-ride="carousel" style="margin-top: 200px;">
        <div class="carousel-inner container">
            <div class="carousel-item active ml-4 row">
                <div class="col-sm">
                    <h3 class="text-white mt-3">Selamat Datang <br> Di Sistem Pengaduan Masyarakat</h3>
                    <br>
                    <p class="text-white">
                        Laporkan kepada kami jika ada penyalahgunaan <br>
                        wewenang pengabaian kewajiban dan/atau <br>
                        pelanggaran peraturan perundang-undangan yang <br>
                        dilakukan oleh pegawai di lingkungan Kementrian <br>
                        Komunikasi dan Informatika
                    </p>
                </div>
                <div class="col-sm">
                    <img src="{{ asset('images/pengaduanmas.svg') }}" class="float-right mr-5"
                        style="width: 26%; margin-top: -280px;" alt="First slide">
                </div>
            </div>
            <div class="carousel-item ml-4 row">
                <div class="col-sm">
                    <h3 class="text-white mt-3">Proses cepat tidak perlu <br> menunggu lama</h3>
                    <br>
                    <p class="text-white">
                        Laporkan kepada kami jika ada penyalahgunaan <br>
                        wewenang pengabaian kewajiban dan/atau <br>
                        pelanggaran peraturan akan kami tindak secepat mungkin
                    </p>
                </div>
                <div class="col-sm">
                    <img src="{{ asset('images/pelayanan.svg') }}" class="float-right mr-5"
                        style="width: 23%; margin-top: -225px" alt="Second slide">
                </div>
            </div>
            <div class="carousel-item ml-4 row">
                <div class="col-sm">
                    <h3 class="text-white mt-3">Layanan buka 24 Jam <br> full time service</h3>
                    <br>
                    <p class="text-white">
                        Laporkan Kepada kami jika ada penyalahgunaan <br>
                        wewenang pengabaian kewajiban dan/atau <br>
                        Pelanggaran peraturan perundang-undangan <br>
                        segera kirimkan laporan anda
                    </p>
                </div>
                <div class="col-sm">
                    <img src="{{ asset('images/service.svg') }}" class="float-right mr-5"
                        style="width: 36%;margin-top: -250px" alt="Third slide">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-left : -100%"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" tyle="margin-left : -100%"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="tahapan">
    </div>
</section>
</div>

{{-- Section Tahapan Pengaduan --}}
<div class="pengaduan mt-5">
    <div  class="bg-dark" style="height: 400px">
        <div class="text-center">
            <h4 class="text-white mt-5 mb-4">TAHAPAN PENGADUAN</h4> <br>
            <div class="row text-white justify-content-center">
                <h1 style="margin-right:20px; margin-top: 10px">1</h1>
                <div class="col-sm-3 text-left border-left">
                    PERTAMA <br> Login Terlebih Dahulu
                </div>
                <h1 style="margin-right: 20px; margin-top: 10px">2</h1>
                <div class="col-sm-3 text-left border-left">
                    KEDUA <br> Ini form pengaduan yang sudah tertera lalu kirim
                </div>
                <h1 style="margin-right: 20px; margin-top: 10px">3</h1>
                <div class="col-sm-3 text-left border-left">
                    KETIGA <br> Tunggu laporan anda ditanggapi oleh petugas
                </div>
            </div>
        </div>
        <div id="tentang_kami">

        </div>
    </div>
</div>

{{-- Section tentang kami --}}
<div class="container">
    <div class="row justify-content-center mt-5">
        <div>
            <h4 class="text-center">Tentang Kami</h4> <br>
            <p>SIDUMAS adalah aplikasi atau program pengaduan masyarakat secara online, ditujukan untuk pihak instansi
                maupun institusi terkait, pelayanan maupun pengalaman yang diterima oleh masyarakat</p>
        </div>

        <div class="container text-center mt-3">
            <div class="row mt-4 bg-light">
                <div class="col-4">
                    <h1 class="mb-3"><i class="fas fa-phone primary-color"></i></h1>
                    <p class="montserrat mb-0" style="font-size: .8rem;">085806640601</p>
                </div>
                <div class="col-4">
                    <h1 class="mb-3"><i class="fas fa-envelope primary-color"></i></h1>
                    <p class="montserrat mb-0" style="font-size: .8rem;">info@sidumascom</p>
                </div>
                <div class="col-4">
                    <h1 class="mb-3"><i class="fas fa-map-marker-alt primary-color"></i></h1>
                    <p class="montserrat mb-0" style="font-size: .8rem;">Purwosari, Pasuruan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12 p-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2078049186716!2d112.74621741435644!3d-7.767775079200021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d3c5631acbf5%3A0xa71d9f205034b481!2sSMK%20Negeri%201%20Purwosari!5e0!3m2!1sid!2sid!4v1595705160792!5m2!1sid!2sid"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0">
                </iframe>
            </div>
        </div>
    </div>
</div>
</div>

{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">©2022 Yolla • All rights reserved</p>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.js"></script>
<script src="https://use.fontawesome.com/releases/vVERSION/js/all.js" data-mutate-approach="sync"></script>

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');
</script>
@endif
@endsection
