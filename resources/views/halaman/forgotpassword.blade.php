<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/password_reveal.js"></script>
    <title>FORGOT</title>
</head>

<body style="background-color: #0081C9">
    <div class="text-white login-register-form position-absolute top-50 start-50 translate-middle">
        <div class="text-center">
            <img src="image/logofull.png" alt="" width="400">
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                        <li>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post">
            @csrf
            <div class="">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Contoh : seseorang@email.com"
                    value="{{ Session::get('email') }}">
            </div>
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a class="text-white" href="/register">Belum memiliki akun? Buat akun.</a>
                </div>
                <div>
                    <a class="text-center text-white" href="/login">Ingat Password?</a>
                </div>
            </div>
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="d-flex justify-content-center">
                        <div>
                            <button type="submit" class="text-white fw-bold fs-5 btn btn-info">Dapatkan Kode Verifikasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
