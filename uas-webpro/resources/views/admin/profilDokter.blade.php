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
        .imgDokter {
            width: 180px;
        }

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
                <img src="{{url('images/logo.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 5px;">
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
    <br>
    <div class="container" id="containerSize">
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalDokter">
                Tambah Dokter
            </button>
        </div>
        <br>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                @foreach($dokters as $dokter)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="{{asset($dokter['foto'])}}" class="imgDokter">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1">{{$dokter['namaDokter']}}</h3>
                                    <h6 class="text-muted">{{$dokter['jenisDokter']}}</h6>
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-grid">
                                                <button class="btn" onclick="openModal(`{{ $dokter['id'] }}`, `{{ $dokter['namaDokter'] }}`, `{{ $dokter['jenisDokter'] }}`)">Update</button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-grid">
                                                <a class="btn" href="{{url('/admin/deletedokter')}}/{{$dokter['id']}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Modal Update Doctor -->
    <script type="text/javascript">
        function openModal(id, nama, spesialisasi) {
            var form = document.getElementById('updateForm');
            var namaInput = document.getElementById('namaInput');
            var spesialisasiInput = document.getElementById('spesialisasiInput');

            form.action = "{{ url('/admin/updatedokter') }}/" + id;
            namaInput.value = nama;
            spesialisasiInput.value = spesialisasi;

            var update = document.getElementById('modalUpdate');
            var modal = new bootstrap.Modal(update);
            modal.show();

        }
    </script>
    <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Update Dokter</h5>
                    </div>
                    <br>
                    <form id="updateForm" action="" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Nama Dokter</label>
                            <div class="col-sm-9">
                                <input id="namaInput" type="text" name="nama" class="form-control" value="" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Spesialisasi</label>
                            <div class="col-sm-9">
                                <input id="spesialisasiInput" type="text" name="spesialisasi" class="form-control" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input id="fotoInput" type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Doctor -->
    <div class="modal fade" id="modalDokter" tabindex="-1" aria-labelledby="modalDokter" aria-hidden="true">    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Tambah Dokter</h5>
                    </div>
                    <br>
                    <form action="{{url('/admin/tambahdokter')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Nama Dokter</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Spesialisasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="spesialisasi" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<br>
<footer class="text-white text-center text-lg-start navbar" style="background-color: #008cb4;">
    <!-- Grid container -->
    <div class="container p-2">
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
</body>
</html>