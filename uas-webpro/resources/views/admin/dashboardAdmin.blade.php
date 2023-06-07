<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Kita Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/animate.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        @media only screen and (max-width: 600px) {
            .navbar {
                height: 0;
            }
        }

        @media only screen and (max-width: 800px) {
            .navbar {
                height: 100px;
            }
        }
        
        @media only screen and (max-width: 1000px) {
            .navbar {
                height: 150px;
            }
        }

        @media only screen and (max-width: 1200px) {
            .navbar {
                height: 200px;
            }
        }
        
        .navbar{
            background-color: #008cb4;
        }

        .custom-bg {
            background-color: #008cb4;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
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
                        <a class="nav-link text-end" href="{{url('/admin/dokter')}}">Profil Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-end" href="{{url('/admin/pasien')}}">Data Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-end" href="{{url('/admin/berkas')}}">Berkas Janji</a>
                    </li> 
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{session('username')}}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{url('/admin/profil')}}">Profil Admin</a></li>
                    <li><a class="dropdown-item" href="{{url('/admin/logout')}}">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="text-center animate__animated animate__fadeIn">
            <img src="{{url('/images/klinik.jpg')}}" alt="..." style="width: 50%;">
        </div>
        <br>
        <div class="container w-50">
            <div class="d-flex justify-content-between">
                <div class="item animate__animated animate__slideInLeft">
                    <a class="nav-link" href="{{url('/admin/dokter')}}">
                        <img src="{{url('images/profil.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
                    </a>
                    <div class="text">
                        <p>Profil Dokter</p>
                    </div>
                </div>
                <div class="item animate__animated animate__slideInUp">
                    <a class="nav-link" href="{{url('/admin/pasien')}}">
                        <img src="{{url('images/data.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
                    </a>
                    <div class="text">
                        <p>Data Pasien</p>
                    </div>
                </div>
                <div class="item animate__animated animate__slideInRight">
                    <a class="nav-link" href="{{url('/admin/berkas')}}">
                        <img src="{{url('images/berkas.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
                    </a>
                    <div class="text">
                        <p>Berkas Janji</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<br>
<footer class="text-white text-center text-lg-start" style="background-color: #008cb4;">
  <div class="container p-4">
    <div class="row mt-4">
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
                        <p class="mb-2 ml-2">Jl. Boulevard no 74 Gading Serpong<br>Kelapa Dua, Tangerang</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-start">
                        <img src="{{url('images/mail.png')}}" class="img-responsive mx-3 mt-3" width="20" height="20" style="margin-left: 10px;">
                        <p class="mb-2 ml-2">admisi@klinikkitasehat.ac.id<br>tanya@klinikkitasehat.ac.id</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-start">
                        <img src="{{url('images/call.png')}}" class="img-responsive mx-3 mt-3" width="20" height="20" style="margin-left: 10px;">
                        <p class="mb-2 ml-2">+62 823 7070 5050 (chat)<br>+62 823 7070 6060 (call)</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Grid column-->


        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 text-center">Jam Buka</h5>


            <table class="table text-center text-black">
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
        </div>
    </div>
</footer>
</html>