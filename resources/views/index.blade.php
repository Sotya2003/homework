<!DOCTYPE html>
<html lang="en">
<!-- -->

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
    <title>Home</title>
</head>

<body class="background">
    @if (Session::get('already_login'))
    <div class="alert alert-success text-center">
        Anda sudah Login.
    </div>
    @endif

    @if (Session::get('logout'))
    <div class="alert alert-success text-center">
        Berhasil Logout.
    </div>
    @endif

    @if (Session::get('failed'))
    <div class="alert alert-danger text-center">
        Silahkan Login terlebih dahulu.
    </div>
    @endif

    @if (Session::get('register_success'))
    <div class="alert alert-success text-center">
        Akun dengan email {{Session::get('register_success')}} berhasil didaftarkan. Silahkan login.
    </div>
    @endif
    <div class="text-center" style="margin-top:10%;">
        <div class="title container text-center" style="font-size:60px;">
            <div class="title2">
                Project PBL
            </div>
        </div>
        <br>
        <div class="menu container text-center" style="font-size:40px;">
            <div class="row">
                <div class="col">
                    <a href="/login">
                        <button class="button-66" role="button">LOGIN</button>
                    </a>
                </div>
                <div class="col">
                    <a href="/dashboard">
                        <button class="button-66" role="button">DASHBOARD</button>
                    </a>
                </div>
                <div class="col">
                    <a href="/home">
                        <button class="button-66" role="button">HOME</button>
                    </a>
                </div>
                <div class="col">
                    <a href="/register">
                        <button class="button-66" role="button">REGISTER</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- deskripsi -->
        <br>
        <div class="desc">
            Silahkan dicoba dulu semua kemungkinan yang bakal bikin bug / error :D. Contoh, langsung ke dashboard atau
            menambahkan '/blabla' di url.
        </div>
    </div>

</body>

</html>
