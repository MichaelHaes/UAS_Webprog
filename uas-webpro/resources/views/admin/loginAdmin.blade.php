<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Kita Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
                        <a class="nav-link active" href="{{url('/admin')}}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card card-body">
                    <h5 class="card-title">Log in Admin KKS</h5>
                        <form action="{{url('/admin/dashboard')}}" method="post">
                            @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
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
                </div>
            </div>
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
</script>
</html>
