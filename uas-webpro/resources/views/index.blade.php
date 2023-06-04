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
                    <img src="{{url('images/logo.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;">
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
    <div class="modal fade" id="modalPasien" tabindex="-1" aria-labelledby="modalPasien" aria-hidden="true">    
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
                                <button type="button" id="toggleButton" class="btn btn-secondary" onclick="togglePasswordVisibility()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Log In</button>
                        </div>
                    </form>
                    
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-link nav-link" id="registerBtn">Register</button>
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
                            <div class="col-lg-8">
                                <div class="card card-body border-0">
                                    <div class="alert alert-danger">
                                        {{ $errors->first('passwordPasien') }}
                                        <div>
                                            <a href="{{url('/pasien/forgotpass')}}" class="text-decoration-none">Forgot password?</a>
                                        </div>
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
                    <form action="{{url('pasien/register')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempatlahir" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggallahir" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" name="telp" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordInputRegister">
                                <button type="button" id="toggleButtonReg" class="btn btn-secondary" onclick="togglePasswordVisibilityReg()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="confirmPassword" class="form-control" id="passwordConfirmRegister">
                                <button type="button" id="toggleButtonRegConfirm" class="btn btn-secondary" onclick="togglePasswordVisibilityRegConfirm()">
                                    Show
                                </button>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-link nav-link" id="loginLink">Already have an account?</button>
                    </div>
                    @if($errors->has('registration'))
                        <script type="text/javascript">
                            window.addEventListener('DOMContentLoaded', function() {
                                var modalRegister = document.getElementById('modalRegister');
                                var modal = new bootstrap.Modal(modalRegister);
                                modal.show();
                            });
                        </script>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card card-body border-0">
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registration') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                                <button type="button" id="toggleButtonAdmin" class="btn btn-secondary" onclick="togglePasswordVisibilityAdmin()">
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
    <!-- Remove the container if you want to extend the Footer to full width. -->
<footer class="text-white text-center text-lg-start" style="background-color: #23242a;">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row mt-4">
      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4">Tentang Klinik</h5>

        <p>
          At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
          voluptatum deleniti atque corrupti.
        </p>

        <p>
          Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
          molestias.
        </p>

        <div class="mt-4">
          <!-- Facebook -->
          <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-facebook-f"></i></a>
          <!-- Dribbble -->
          <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-dribbble"></i></a>
          <!-- Twitter -->
          <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-twitter"></i></a>
          <!-- Google + -->
          <a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-google-plus-g"></i></a>
          <!-- Linkedin -->
        </div>
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

            <table class="table text-center text-black">
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

  <!-- Copyright -->
</footer>

</div>
<!-- End of .container -->
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
    
    function togglePasswordVisibilityReg() {
        var passwordInput = document.getElementById("passwordInputRegister");
        var toggleButton = document.getElementById("toggleButtonReg");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show";
        }
    }

    function togglePasswordVisibilityRegConfirm() {
        var passwordInput = document.getElementById("passwordConfirmRegister");
        var toggleButton = document.getElementById("toggleButtonRegConfirm");

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
        var toggleButton = document.getElementById("toggleButtonAdmin");

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