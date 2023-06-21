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
    <script src="https://kit.fontawesome.com/2c3f845fef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Dashboard</title>
</head>

<body class="text-white">
    <!-- navbar -->
    <div class="w3-sidebar w3-bar-block" style="width:20%; background-color: #0081C9">
        <a href="/home">
            <div class="text-center pt-2">
                <i class="fa-solid fa-arrow-left fa-2xl" style="color: #ffffff;"></i>
            </div>
        </a>

        <h1 class="text-center">DASHBOARD</h1>
        @if(Session::get('users')->permission=='user')
            <div class="p-2 fs-5">
                <a href="/dashboard/profil"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/profil')) ? 'home_menu_selected' : '' }}">Profil</a>
                <a href="/dashboard/pesanan"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/pesanan')) ? 'home_menu_selected' : '' }}">Status
                    Pesanan</a>
                <a href="/dashboard/riwayat-transaksi"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/riwayat-transaksi')) ? 'home_menu_selected' : '' }}">Riwayat
                    Transaksi</a>
            </div>
        @endif
        @if(Session::get('users')->permission=='worker')
            <div class="p-2 fs-5">
                <a href="/dashboard/profil"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/profil')) ? 'home_menu_selected' : '' }}">Profil</a>
                <a href="/dashboard/pesanan"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/pesan-masuk')) ? 'home_menu_selected' : '' }}">Pesanan
                    Masuk
                    @if (Session::get('worker_notif_pesanan')>0)
                        <i class="fa-solid fa-circle fa-bounce" style="color: #ff0000;"></i>
                    @endif
                </a>
                <a href="/dashboard/riwayat-transaksi"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/riwayat-transaksi')) ? 'home_menu_selected' : '' }}">Riwayat
                    Pesanan</a>
            </div>
        @endif
        @if(Session::get('users')->permission=='admin')
            <div class="p-2 fs-5">
                <a href="/dashboard/profil"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/profil')) ? 'home_menu_selected' : '' }}">Profil
                </a>
                <a href="/dashboard/kelola-akun"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/kelola-akun')) ? 'home_menu_selected' : '' }}">Kelola
                    Akun
                </a>
                <a href="/dashboard/semua-transaksi"
                    class="nav-link home_menu_select {{ (request()->is('dashboard/semua-transaksi')) ? 'home_menu_selected' : '' }}">Lihat
                    Transaksi
                </a>
                <a href="/dashboard/laporan" class="nav-link home_menu_select {{ (request()->is('dashboard/laporan')) ? 'home_menu_selected' : '' }}">
                    Buat Laporan
                </a>
            </div>
        @endif
    </div>
    <!-- navbar -->

    <!-- konten -->
    <div class="text-black p-1" style="margin-left:20%">
        <div class="">
            @yield('dashboard')
        </div>
    </div>
    <!-- konten -->
</body>

</html>
