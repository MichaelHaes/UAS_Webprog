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
                {{$username}}
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
            <img src="{{url('/images/review.png')}}" alt="..." style="width: 7.5%;">
            <h3>Review Dokter</h3>
        </div>
        @foreach($dokters as $dokter)
            <div class="card">
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-1">{{$dokter['namaDokter']}}</h3>
                                    <h6 class="text-muted">{{$dokter['jenisDokter']}}</h6>
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-grid">
                                                <button class="btn" onclick="openModal(`{{ $dokter['idDokter'] }}`)">Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <!-- Modal Review -->
    <script type="text/javascript">
        function openModal(id) {
            var form = document.getElementById('updateForm');

            form.action = "{{ url('/pasien/review') }}/" + id;

            var update = document.getElementById('modalReview');
            var modal = new bootstrap.Modal(update);
            modal.show();

        }
    </script>
    <div class="modal fade" id="modalReview" tabindex="-1" aria-labelledby="modalReview" aria-hidden="true">    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Review Dokter</h5>
                    </div>
                    <br>
                    <form id="updateForm" action="" method="post">
                        @csrf
                        @foreach($janjis as $janji)
                        <input type="hidden" name="idJanji" value="{{ $janji['idJanji'] }}">
                        @endforeach
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Rating</label>
                            <div class="form-check col-sm-9">
                                <input id="rate1" type="radio" name="rate" class="form-check-input" value="1">
                                <label class="form-check-label" for="rate">1</label><br>
                                <input id="rate2" type="radio" name="rate" class="form-check-input" value="2">
                                <label class="form-check-label" for="rate">2</label><br>
                                <input id="rate3" type="radio" name="rate" class="form-check-input" value="3">
                                <label class="form-check-label" for="rate">3</label><br>
                                <input id="rate4" type="radio" name="rate" class="form-check-input" value="4">
                                <label class="form-check-label" for="rate">4</label><br>
                                <input id="rate5" type="radio" name="rate" class="form-check-input" value="5">
                                <label class="form-check-label" for="rate">5</label><br>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea id="review" name="review" class="form-control" placeholder="review"></textarea>
                                <label for="review">Review</label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        <!--Grid row-->
    </div>
    <!-- Grid container -->
</html>