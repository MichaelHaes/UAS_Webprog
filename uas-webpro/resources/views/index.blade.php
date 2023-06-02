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
            <a class="navbar-brand" href="{{url('/')}}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pasien')}}">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin')}}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="text-center">
            <img src="{{url('/images/klinik.jpg')}}" alt="..." style="width: 50%;">
        </div>
        <p>
            Untuk mendapat sebuah pencapaian yang maksimal dalam memberikan pelayanan kesehatan yang terbaik maka sudah selayaknya sebuah klinik memiliki visi dan misi yang jelas agar semua tujuan dapat mudah dicapai. Adapun visi dan misi Klinik Kita Sehat adalah sebagai  berikut :
            </p>
        <p> 
        <b>Visi :</b><br>
            Menyehatkan masyarakat dan memasyarakatkan kesehatan
        </p>
        <p>
        <b>Misi :</b><br>
            1. Sebagai mitra pemerintah maupun swasta dalam memberikan pelayanan prefentif, kuratif dan rehabilitative yang komprehensif dan berkesinambungan.<br> 
            2. Memberikan pelayanan medis dasar yang berbasis hemat dan terjangkau.<br>
            3. Memberikan pelayanan kesehatan yang cepat, tepat, bermutu dan terjangkau.<br>
            4. Menumbuhkan kesadaran budaya hidup sehat.<br>
            5. Menjalin Kemitraan dengan masyarakat sekitar. 
        </p>
    </div>
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
</html>