<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        .navbar{
            background-color: #008cb4;
        }

        .custom-bg {
            background-color: #008cb4;
        }

        .fade-in {
            animation: fadeInAnimation 1s ease-in forwards;
            opacity: 0;
        }
        
        @keyframes fadeInAnimation {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body class="fade-in">
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/admin/dashboard')}}">
                <img src="{{url('images/logo.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/dokter')}}">Profil Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/pasien')}}">Data Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/berkas')}}">Berkas Janji</a>
                    </li> 
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{$username}}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{url('/admin/profil')}}">Profil Admin</a></li>
                    <li><a class="dropdown-item" href="{{url('/admin/logout')}}">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
<br>
<div class="container">
    <div class="text-center">
        <img src="{{url('/images/berkas.png')}}" alt="..." style="width: 7.5%;">
        <h3>Berkas Janji</h3>
    </div>
    <div class="card">
        <div class="card-body row">
            @foreach($janjis as $janji)
                <div class="col-lg-6">
                    <div class="card mb-3" >
                        <div class="card">
                            <div class="card-header">
                                {{$janji['idJanji']}}
                            </div>
                            <div class="card-body row">
                                <strong class="col-3">Nama Pasien</strong> <p class="col-9">: {{$janji['namaPasien']}}</p>
                                <strong class="col-3">Nama Dokter</strong> <p class="col-9">: {{$janji['namaDokter']}}</p>
                                <strong class="col-3">Tanggal Temu</strong><p class="col-9">: {{$janji['tanggal_temu']}}</p>
                                <strong class="col-3">Jam Temu</strong>    <p class="col-9">: {{$janji['jam_temu']}}</p>
                                <strong class="col-3">Keluhan</strong>     <p class="col-9">: {{$janji['keluhan']}}</p>
                                <strong class="col-3">Status</strong>      <p class="col-9">: {{$janji['status']}}</p>
                            </div>
                            <form action="{{url('/admin/berkas/action')}}" method="POST">
                                @csrf
                                <input type="hidden" name="idJanji" value="{{$janji['idJanji']}}">
                                <button class="btn" name="action" value="accept">Accept</button>
                                <button class="btn" name="action" value="decline">Decline</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br>

<footer class="text-white text-center text-lg-start navbar" style="background-color: #008cb4;">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 text-center">Tentang Klinik</h5>

            <p class="text-center">
            Klinik Kita Sehat selalu memberikan layanan kesehatan untuk semua orang dengan cepat dan harga yang terjangkau.
            </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 text-center">INFORMASI KLINIK</h5>
            <div class="d-flex flex-column">
                <div>
                    <div class="d-flex justify-content-start">
                        <img src="{{url('images/pinpoint.png')}}" class="img-responsive mx-3 mt-3" width="20" height="20" style="margin-left: 10px;">
                         <p>Jl. Boulevard no 74 Gading Serpong, Kelapa Dua, Tangerang</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-start">
                        <img src="{{url('images/mail.png')}}" class="img-responsive mx-3 mt-3" width="20" height="20" style="margin-left: 10px;">
                        <p>admisi@klinikkitasehat.ac.id tanya@klinikkitasehat.ac.id</p>
                    </div>
                </div> 
                <div>
                    <div class="d-flex justify-content-start">
                        <img src="{{url('images/call.png')}}" class="img-responsive mx-3 mt-3" width="20" height="20" style="margin-left: 10px;">
                        <p>+62 823 7070 5050 (chat)<br>+62 823 7070 6060 (call)</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 text-center">Jam Buka</h5>

            <table class="table text-center">
            <tbody class="font-weight-normal">
                <tr>
                <td class="text-light" style="background-color: #008cb4">Senin - Jum'at:</td>
                <td class="text-light" style="background-color: #008cb4">08:00 - 23:00</td>
                </tr>
                <tr>
                <td class="text-light" style="background-color: #008cb4">Sabtu - Minggu:</td>
                <td class="text-light" style="background-color: #008cb4">08:00 - 21:00</td>
                </tr>
            </tbody>
            </table>
        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->
</html>