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
            <a class="navbar-brand" href="{{url('/')}}">KKS</a>
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
</html>