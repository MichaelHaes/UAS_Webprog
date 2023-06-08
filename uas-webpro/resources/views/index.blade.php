<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Kita Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to toggle flex-row and flex-column classes
            function toggleFlexClass() {
                var screenWidth = $(window).width();
                if (screenWidth < 992) {
                $('#visimisi').removeClass('flex-row').addClass('flex-column');
                } else {
                $('#visimisi').removeClass('flex-column').addClass('flex-row');
                }
            }


            // Initial call to set the class based on the initial screen width
            toggleFlexClass();


            // Call the toggleFlexClass function on window resize
            $(window).resize(function() {
                toggleFlexClass();
            });
        });
    </script>
    <style>
        p {text-align: center;}


        .navbar{
            background-color: #008cb4;
        }
       
        .custom-bg {
            background-color: #008cb4;
        }


        @media only screen and (max-width: 575px) {
            .navbar {
                height: 85px;
            }


            .logo {
                margin-bottom: 10px;
            }
        } 


        @media only screen and (max-width: 1200px) {
            #gambarKlinik {
                width: 100%;
                max-width: 600px;
                height: auto;
            }


            #divGambar {
                height: 400px;
            }
        }
    </style>
</head>
<body class="fade-in">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <div style="display: flex; align-items: center;">
                    <img src="{{url('images/logo.png')}}" class="img-responsive" width="75" height="75" style="margin-left: 10px;" id="logo">
                </div>
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="btn btn-link nav-link float-end" data-bs-toggle="modal" data-bs-target="#modalPasien">
                            Pasien
                        </button>
                    </li>
                    
                    <li class="nav-item">
                        <button class="btn btn-link nav-link float-end" data-bs-toggle="modal" data-bs-target="#modalAdmin">
                            Admin
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="toast-container p-3" id="toastPlacement">
        <div id="invalidTokenToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Alert!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @if($errors->has('tokenInvalid'))
                    <script type="text/javascript">
                        window.addEventListener('DOMContentLoaded', function() {
                            var invalidTokenToast = document.getElementById('invalidTokenToast');
                            var toast = new bootstrap.Toast(invalidTokenToast);
                            toast.show();
                        });
                    </script>
                    {{ $errors->first('tokenInvalid') }}
                @endif
            </div>
        </div>
    </div>


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
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="passwordInput">
                                    <img src="images/eyeopen.png" height="20" width="20" id="eyepassword" onclick="togglePasswordVisibility()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-3">
                                <img src="{{ captcha_src() }}" alt="CAPTCHA">
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="captcha" class="form-control">
                                    <img src="images/refresh.png" height="20" width="20" id="change-captcha" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Log In</button>
                        </div>
                    </form>
                   
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalRegister">Register</button>
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
                                            <button class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalForgotPass">Forgot password?</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($errors->has('captcha'))
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
                                        {{ $errors->first('captcha') }}
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
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempatlahir" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggallahir" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
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
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="passwordInputRegister">
                                    <img src="images/eyeopen.png" height="20" width="20" id="eyepasswordReg" onclick="togglePasswordVisibilityReg()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="confirmPassword" class="form-control" id="passwordConfirmRegister">
                                    <img src="images/eyeopen.png" height="20" width="20" id="eyepasswordRegConfirm" onclick="togglePasswordVisibilityRegConfirm()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>  
                        <div class="d-grid">
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-link nav-link" id="loginLink" data-bs-toggle="modal" data-bs-target="#modalPasien">Already have an account?</button>
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

    <!-- Modal Forgot Password -->
    <div class="modal fade" id="modalForgotPass" tabindex="-1" aria-labelledby="modalForgotPass" aria-hidden="true">    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Forgot Password KKS</h5>
                    </div>
                    <br>
                    <form action="{{url('/pasien/forgotpass')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="passwordInputForgot">
                                    <img src="images/eyeopen.png" height="20" width="20" id="eyepasswordForgot" onclick="togglePasswordVisibilityForgot()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="confirmpassword" class="form-control" id="passwordConfirmForgot">
                                    <img src="images/eyeopen.png" height="20" width="20" id="eyepasswordForgotConfirm" onclick="togglePasswordVisibilityForgotConfirm()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                    @if($errors->has('forgotpass'))
                        <script type="text/javascript">
                            window.addEventListener('DOMContentLoaded', function() {
                                var modalForgotPass = document.getElementById('modalForgotPass');
                                var modal = new bootstrap.Modal(modalForgotPass);
                                modal.show();
                            });
                        </script>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card card-body border-0">
                                    <div class="alert alert-danger">
                                        {{ $errors->first('forgotpass') }}
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
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="passwordInputAdmin">
                                        <img src="images/eyeopen.png" height="20" width="20" id="eyepasswordAdmin" onclick="togglePasswordVisibilityAdmin()" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                </div>
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
        <div class="text-center" id="divGambar">
            <img src="{{url('/images/klinik.jpg')}}" alt="..." style="width: 50%;" id="gambarKlinik">
        </div>


        <div class="d-flex justify-content-center">
            <div class="card-body">
                <p style="font-size: 18px; line-height: 1.5; text-align: justify;">
                    Klinik Kita Sehat adalah sebuah lembaga kesehatan yang didedikasikan untuk memberikan perawatan dan layanan kesehatan yang komprehensif kepada masyarakat. Klinik ini berkomitmen untuk meningkatkan kualitas hidup dan kesejahteraan fisik serta mental pasien-pasiennya. Klinik Kita Sehat menyediakan berbagai layanan medis, termasuk pemeriksaan umum, konsultasi dokter, pemeriksaan laboratorium, serta layanan kesehatan lainnya. Tim medis yang terlatih dan berpengalaman di klinik ini siap melayani setiap pasien dengan perhatian dan keahlian yang tinggi.
                </p>
                <p style="font-size: 18px; line-height: 1.5; text-align: justify;">
                    Untuk mendapat sebuah pencapaian yang maksimal dalam memberikan pelayanan kesehatan yang terbaik, maka sudah selayaknya sebuah klinik memiliki visi dan misi yang jelas agar semua tujuan dapat mudah dicapai. Adapun visi dan misi Klinik Kita Sehat adalah sebagai berikut:
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="card" style="border: 2px solid #ccc; border-radius: 10px; padding: 10px;">
                        <div class="card-body">
                            <h4 class="text-center" style="color: #333; margin-bottom: 10px;">Visi</h4>
                            <p style="font-size: 16px; line-height: 1.5; text-align: justify;">
                                Menjadi penyedia layanan kesehatan yang dapat menyehatkan masyarakat, memasyarakatkan kesehatan, serta terdepan dalam memberikan perawatan berkualitas tinggi dan inovatif kepada pasien, dengan fokus pada pemulihan dan kesejahteraan yang holistik
                            </p>    
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="card" style="border: 2px solid #ccc; border-radius: 10px; padding: 10px;">
                        <div class="card-body">
                            <h4 class="text-center" style="color: #333; margin-bottom: 10px;">Misi</h4>
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
    </div>
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


</div>
<!-- End of .container -->
</body>


<script>
    document.getElementById('change-captcha').addEventListener('click', function() {
        var captchaImage = document.querySelector('img[alt="CAPTCHA"]');
        captchaImage.src = captchaImage.src + '&reload=' + new Date().getTime();
    });
    
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        var eyepassword = document.getElementById("eyepassword")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png");
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png");
        }
    }
   
    function togglePasswordVisibilityAdmin() {
        var passwordInput = document.getElementById("passwordInputAdmin");
        var eyepassword = document.getElementById("eyepasswordAdmin")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png")
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png")
        }
    }
   
   function togglePasswordVisibilityReg() {
       var passwordInput = document.getElementById("passwordInputRegister");
       var eyepassword = document.getElementById("eyepasswordReg")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png")
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png")
        }
   }

   function togglePasswordVisibilityRegConfirm() {
       var passwordInput = document.getElementById("passwordConfirmRegister");
       var eyepassword = document.getElementById("eyepasswordRegConfirm")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png")
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png")
        }
   }
   
   function togglePasswordVisibilityForgot() {
       var passwordInput = document.getElementById("passwordInputForgot");
       var eyepassword = document.getElementById("eyepasswordForgot")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png")
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png")
        }
   }

   function togglePasswordVisibilityForgotConfirm() {
       var passwordInput = document.getElementById("passwordConfirmForgot");
       var eyepassword = document.getElementById("eyepasswordForgotConfirm")
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyepassword.setAttribute("src", "images/eyeclosed.png")
        } else {
            passwordInput.type = "password";
            eyepassword.setAttribute("src", "images/eyeopen.png")
        }
   }
</script>
</html>

