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
        p {text-align: center;}
        
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <div style="display: flex; align-items: center;">
                    <img src="{{url('images/logo.jpg')}}" class="img-responsive" width="50" height="50" style="margin-right: 10px;">
                    <p style="margin: 0;">KKS</p>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/pasien')}}">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin')}}">Admin</a>
                    </li> -->
                    <li class="nav-item">
                        <button class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalPasien">
                            Pasien
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalAdmin">
                            Admin
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Pasien -->
    <div class="modal fade" id="modalPasien" tabindex="-1" aria-labelledby="modalPasien" aria-hidden="true">>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Login Pasien KKS</h5>
                    </div>
                    <br>
                    <form action="{{url('/pasien/dashboard')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="password" class="form-label me-2">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordInput">
                                <button type="button" id="toggleButton" class="btn btn-secondary" onclick="togglePasswordVisibilityAdmin()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Log In</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <button class="btn btn-link nav-link" id="registerBtn">Register</button>
                        <!-- <a href="{{url('/pasien/register')}}" class="text-decoration-none">Register</a> -->
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{url('/pasien/forgotpass')}}" class="text-decoration-none">Forgot Password?</a>
                    </div>
                    @if($errors->has('passwordPasien'))
                        <script type="text/javascript">
                            window.addEventListener('DOMContentLoaded', function() {
                                var modalPasien = document.getElementById('modalPasien');
                                var modal = new bootstrap.Modal(modalPasien);
                                modal.show();
                            });
                        </script>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card card-body border-0">
                                    <div class="alert alert-danger">
                                        {{ $errors->first('passwordPasien') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegister" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Register KKS</h5>
                    </div>
                    <br>
                    <form action="{{url('/pasien')}}" method="get">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempatlahir" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tanggallahir" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <!-- <a href="{{url('/pasien')}}" class="text-decoration-none">Already have an account?</a> -->
                        <button class="btn btn-link nav-link" id="loginLink">Already have an account?</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Admin -->
    <div class="modal fade" id="modalAdmin" tabindex="-1" aria-labelledby="modalAdmin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Login Admin KKS</h5>
                    </div>
                    <br>
                    <form action="{{url('/admin/dashboard')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="password" class="form-label me-2">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordInput">
                                <button type="button" id="toggleButton" class="btn btn-secondary" onclick="togglePasswordVisibilityAdmin()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Log In</button>
                        </div>
                    </form>

                    @if($errors->has('passwordAdmin'))
                        <script type="text/javascript">
                            window.addEventListener('DOMContentLoaded', function() {
                                var modalAdmin = document.getElementById('modalAdmin');
                                var modal = new bootstrap.Modal(modalAdmin);
                                modal.show();
                            });
                        </script>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card card-body border-0">
                                    <div class="alert alert-danger">
                                        {{ $errors->first('passwordAdmin') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <img src="{{url('/images/klinik.jpg')}}" alt="..." style="width: 50%;">
        </div>

        <div class="card text-center mx-auto border-0" style="width: 50rem; border: 2px solid #ccc; border-radius: 10px; padding: 20px;">
            <div class="card-body">
                <p style="font-size: 18px; line-height: 1.5; text-align: justify;">
                    Untuk mendapat sebuah pencapaian yang maksimal dalam memberikan pelayanan kesehatan yang terbaik, maka sudah selayaknya sebuah klinik memiliki visi dan misi yang jelas agar semua tujuan dapat mudah dicapai. Adapun visi dan misi Klinik Kita Sehat adalah sebagai berikut:
                </p>
                <div class="card mx-auto" style="width: 40rem; border: 2px solid #ccc; border-radius: 10px; padding: 20px; margin-top: 20px;">
                    <div class="card-body">
                        <h4 style="color: #333; margin-bottom: 10px;">Visi:</h4>
                        <p style="font-size: 16px; line-height: 1.5; text-align: justify;">
                        Menjadi penyedia layanan kesehatan yang dapat menyehatkan masyarakat, memasyarakatkan kesehatan, serta terdepan dalam memberikan perawatan berkualitas tinggi dan inovatif kepada pasien, dengan fokus pada pemulihan dan kesejahteraan yang holistik
                        </p>
                    </div>
                </div>
                <div class="card mx-auto" style="width: 40rem; border: 2px solid #ccc; border-radius: 10px; padding: 20px; margin-top: 20px;">
                    <div class="card-body">
                        <h4 style="color: #333; margin-bottom: 10px;">Misi:</h4>
                        <ol style="font-size: 16px; line-height: 1.5; text-align: left;">
                            <li>Sebagai mitra pemerintah maupun swasta dalam memberikan pelayanan prefentif, kuratif, dan rehabilitative yang komprehensif dan berkesinambungan.</li>
                            <li>Memberikan pelayanan medis dasar yang berbasis hemat dan terjangkau.</li>
                            <li>Memberikan pelayanan kesehatan yang cepat, tepat, bermutu, dan terjangkau.</li>
                            <li>Menumbuhkan kesadaran budaya hidup sehat.</li>
                            <li>Menjalin kemitraan dengan masyarakat sekitar.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="text-center text-lg-start bg-light text-muted" style="padding-top: 0.2px;">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-print me-3"></i>+62-21.5422.0800</p>
                </div>
            </div>
        </div>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Klinik Kita Sehat
        </div>
    </div>
</body>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        var toggleButton = document.getElementById("toggleButton");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show";
        }
    }
    
    function togglePasswordVisibilityAdmin() {
        var passwordInput = document.getElementById("passwordInputAdmin");
        var toggleButton = document.getElementById("toggleButton");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show";
        }
    }


    document.addEventListener("DOMContentLoaded", function() {
        var registerBtn = document.getElementById("registerBtn");
        var loginLink = document.getElementById("loginLink");
        var modalPasien = document.getElementById("modalPasien");
        var modalRegister = document.getElementById("modalRegister");

        // Register button click event
        registerBtn.addEventListener("click", function() {
            modalPasien.classList.remove("show");
            modalPasien.style.display = "none";
            modalRegister.classList.add("show");
            modalRegister.style.display = "block";
        });

        // Already have an account link click event
        loginLink.addEventListener("click", function() {
            modalRegister.classList.remove("show");
            modalRegister.style.display = "none";
            modalPasien.classList.add("show");
            modalPasien.style.display = "block";
        });
    });




</script>
</html>