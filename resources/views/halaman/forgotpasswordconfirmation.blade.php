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
    <title>LOGIN</title>
</head>

<body class="text-white" style="background-color: #0081C9">
    <div class="login-register-form position-absolute top-50 start-50 translate-middle">
        <div class="text-center">
            <h1>Buat Password Baru</h1>
        </div>
        @if (Session::get('forgot_password'))
            <div class="alert alert-success text-center">
                Kode Verifikasi Telah Terkirim Ke Email {{Session::get('email')}}
            </div>
        @endif
        @if (Session::get('verification_failed'))
            <div class="alert alert-danger text-center">
                Kode Konfirmasi salah!.
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input @if(Session::get('confirmation_code')){{'disabled'}}@endif name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Contoh : seseorang@email.com"
                    value="{{Session::get('email')}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Aman, password dienkripsi kok :)">
                <input type="checkbox" onclick="lihat_password()"> Lihat Password
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kode Verifikasi</label>
                <input name="confirmation_code" type="number" class="form-control" id="exampleInputPassword1"
                    placeholder="Cek Email">
            </div>
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col d-flex justify-content-between">
                        <div>
                           <button type="submit" class="bg-black btn btn-primary">Ganti Password</button> 
                        </div>
                        <div>
                            <a class="bg-black btn btn-primary" href="/home">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-between">
                    <div>
                        <br>
                        <a class="text-white p-3" href="/register">Belum memiliki akun?</a>
                    </div>
                    <div>
                        <br>
                        <a class="text-white p-3" href="/login">Ingat Password?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
