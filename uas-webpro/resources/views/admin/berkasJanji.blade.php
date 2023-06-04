<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
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
        <img src="{{url('/images/berkas.png')}}" alt="..." style="width: 30%;">
    </div>
</div>
<br>

<footer class="text-white text-center text-lg-start navbar" style="background-color: #23242a;">
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
            <ul class="fa-ul" style="margin-left: 1.65em;">
            <li class="mb-3">
                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Jl. Boulevard, Gading Serpong, Kel. Curug Sangereng, Kec. Kelapa Dua, Kab. Tangerang,
    Prov. Banten, Indonesia
    </span>
            </li>
            <li class="mb-3">
                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">admisi@umn.ac.id</span>
            </li>
            <li class="mb-3">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+62-21.5422.0800</span>
            </li>
            <li class="mb-3">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+62-21.5422.0808</span>
            </li>
            </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 text-center">Jam Buka</h5>

            <table class="table text-center">
            <tbody class="font-weight-normal">
                <tr>
                <td class="text-light bg-dark">Senin - Jum'at:</td>
                <td class="text-light bg-dark">08:00 - 23:00</td>
                </tr>
                <tr>
                <td class="text-light bg-dark">Sabtu - Minggu:</td>
                <td class="text-light bg-dark">08:00 - 21:00</td>
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