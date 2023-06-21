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

<body style="background-color: #0081C9">
    <div class="login-register-form position-absolute top-50 start-50 translate-middle text-white">
        <div class="text-center">
            <a href="/home"><img src="image/logofull.png" alt="" width="400"></a>
        </div>

        <form action="" method="post">
            @csrf
            @if(Session::get('login_failed'))
                <div class="alert alert-danger">
                    Email atau Password salah.
                </div>
            @endif
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
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Contoh : seseorang@email.com"
                    value="{{ Session::get('email') }}">
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
                    <div>
                            <a class="text-white" href="/forgot">Lupa Password?</a>
                    </div>
                </div>
                
            </div>
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="mb-3 col d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-info">
                                <div class="text-white fw-bold fs-5">LOGIN</div>
                            </button>
                        </div>
                    </div>
                    <div>
                        Atau gunakan
                        <div class="d-flex justify-content-center p-2">
                            <div class="bg-white border rounded shadow">
                                <a href="/auth/google">
                                    <img src="/image/icon/google.png" alt="" width="50" class="p-2">
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div>
                        <br>
                        <a class="text-white" href="/register">Belum memiliki akun? Buat akun.</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
