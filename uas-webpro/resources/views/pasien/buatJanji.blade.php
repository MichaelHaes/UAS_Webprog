<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Kita Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        .navbar{
            background-color: #008cb4;
        }

        .custom-bg {
            background-color: #008cb4;
        }
        .imgDokter {
            width: 120px;
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
            <a class="navbar-brand" href="{{url('/pasien/dashboard')}}">
                <img src="{{url('images/logo.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pasien/janji')}}">Buat Janji</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pasien/review')}}">Review Dokter</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{session('username')}}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{url('/pasien/profil')}}">Profil Pasien</a></li>
                <li><a class="dropdown-item" href="{{url('/pasien/logout')}}">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="text-center">
            <img src="{{url('/images/janji.png')}}" alt="..." style="width: 7.5%;">
            <h3>Janji Dengan Dokter</h3>
        </div>
        <div class="card mb-3 w-50 mx-auto">
            <div class="card-body">
                <form action="{{url('/pasien/janji/confirm')}}" class="form-inline" method="post">
                    <div class="form-group row">
                        <label for="dokter" class="col-sm-2 col-form-label">Dokter:</label>
                        <div class="col-sm-10">
                            <select id="dokter" name="dokter" class="form-control">
                            @foreach($dokters as $dokter)
                                <option value="{{$dokter['id']}}">{{$dokter['namaDokter']}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="pasien" class="col-sm-2 col-form-label">Pasien:</label>
                        <div class="col-sm-10">
                            <input id="pasien" class="form-control" value="{{ data_get(session('pasien'), 'nama') }}" disabled>
                            <input type="hidden" class="form-control" name="pasien" value="{{ data_get(session('pasien'), 'idPasien') }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Keluhan:</label>
                        <div class="col-sm-10">
                            <textarea id="keluhan" class="form-control" name="keluhan"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal:</label>
                        <div class="col-sm-10">
                            <input type="date" id="tanggal" class="form-control" name="tanggal">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Jam:</label>
                        <div class="col-sm-10">
                            <select id="waktu" name="waktu" class="form-control">
                                <option value="09.00 - 10.00">09.00 - 10.00</option>
                                <option value="10.00 - 11.00">10.00 - 11.00</option>
                                <option value="11.00 - 12.00">11.00 - 12.00</option>
                                <option value="12.00 - 13.00">12.00 - 13.00</option>
                                <option value="13.00 - 14.00">13.00 - 14.00</option>
                                <option value="14.00 - 15.00">14.00 - 15.00</option>
                                <option value="15.00 - 16.00">15.00 - 16.00</option>
                                <option value="16.00 - 17.00">16.00 - 17.00</option>
                                <option value="17.00 - 18.00">17.00 - 18.00</option>
                                <option value="18.00 - 19.00">18.00 - 19.00</option>
                                <option value="19.00 - 20.00">19.00 - 20.00</option>
                                <option value="20.00 - 21.00">20.00 - 21.00</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            @if($errors->has('janji'))
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card card-body border-0">
                            <div class="alert alert-danger">
                                {{ $errors->first('janji') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <br>
</body>
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

            <!-- <p>
            Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
            molestias.
            </p> -->

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
        <!--Grid column-->
        </div>
    </div>
    <!-- Grid container -->
</html>