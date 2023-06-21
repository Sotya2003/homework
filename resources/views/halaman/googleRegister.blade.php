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
    <title>REGISTER - Google</title>
</head>

<body style="background-color: #0081C9" class="text-white">
    <div class="login-register-form position-absolute top-50 start-50 translate-middle">
        <div class="align-items-center gap-3 mb-3">
            <div>
                <img src="/image/logofull.png" alt="" width="400">
            </div>
            <div class="text-center bg-white rounded shadow p-2">
                <img src="/image/icon/google.png" alt="" width="70">
            </div>
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
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Contoh : AryaSotya"
                    value="{{ Session::get('google_register')->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Contoh : seseorang@email.com"
                    value="{{ Session::get('google_register')->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input name="no_telp" type="number" class="form-control" aria-describedby="emailHelp"
                    placeholder="Contoh : 628123456789, tanpa '0'"
                    value="{{ Session::get('no_telp') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Aman, password dienkripsi kok :)"
                    value="{{ Session::get('password') }}">
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="checkbox" onclick="lihat_password()"> Lihat Password
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="p-3">
                    <button type="submit" class="text-white fs-5 fw-bold btn btn-info">Daftar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
