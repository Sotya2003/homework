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
    <script src="https://kit.fontawesome.com/2c3f845fef.js" crossorigin="anonymous"></script>
    @yield('head')
    <title>Home</title>
</head>

<body>
    <!-- navbar -->
    <nav class="sticky-top navbar navbar-expand-lg" style="background-color: #0081C9">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home"><img width="55" src="/image/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item p-2">
                        <a class="nav-link text-white home_menu_select {{ (request()->is('home')) ? 'home_menu_selected' : '' }}"
                            href="/home">Home</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link text-white home_menu_select {{ (request()->is('kontak')) ? 'home_menu_selected' : '' }}"
                            href="#kontak">Hubungi</a>
                    </li>
                    
                        <li class="nav-item p-2">
                            <a class="nav-link text-white home_menu_select {{ (request()->is('layanan')) ? 'home_menu_selected' : '' }}"
                                href="/layanan">Layanan
                            </a>
                        </li>  
                    
                    @if(Session::get('users'))
                        <li class="nav-item dropdown p-2">
                            <a class="text-white nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Session::get('users')->email }}
                                @if (Session::get('worker_notif_pesanan')>0)
                                    <i class="fa-solid fa-circle fa-bounce" style="color: #ff0000;"></i>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Pengaturan</button></li>
                                <li><a class="dropdown-item" href="/dashboard">Dashboard @if (Session::get('worker_notif_pesanan')>0)<i class="fa-solid fa-circle fa-bounce" style="color: #ff0000;"></i>@endif</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(!Session::get('users'))
                        <li class="nav-item p-2">
                            <a class="nav-link text-white home_menu_select {{ (request()->is('login')) ? 'home_menu_selected' : '' }}"
                                href="/login">Login</a>
                        </li>
                    @endif
                    <li class="nav-item p-2">
                        <a class="nav-link text-white home_menu_select {{ (request()->is('tentang-kami')) ? 'home_menu_selected' : '' }}"
                            href="/tentang-kami">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->


    <!-- pesan -->
    <div class="toast-container position-fixed bottom-50 end-0 p-3 notif alert fs-3">
        @if (Session::get('logout'))
            <div class="alert alert-danger">
                Berhasil Logout. 
            </div>
        @endif

        @if(Session::get('success') or Session::get('google_account_login'))
            <div class="alert alert-success text-center">
                {{ Session::get('users')->email }} Telah berhasil Login.
            </div>
        @endif

        @if(Session::get('register_success') or Session::get('google_account_register'))
            <div class="alert alert-success text-center">
                Akun dengan email {{ Session::get('register_success') }}{{Session::get('google_account_register')}} berhasil didaftarkan.
                Silahkan login.
            </div>
        @endif

        @if(Session::get('forgot_password_success'))
            <div class="alert alert-success text-center">
                Berhasil Mengubah Password Akun. Silahkan Login.
            </div>
        @endif
    </div>
    <!-- pesan -->

    <!-- konten -->
    @yield('konten')
    <!-- konten -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label for="">Alamat Email</label>
                        &emsp;
                        &nbsp;
                        &nbsp;
                        <input size="30" type="email" disabled
                            value="@if (Session::get('users')){{ Session::get('users')->email }} @endif">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label for="">Nomor Telepon</label>
                        &emsp;
                        <input size="30" disabled value="@if (Session::get('users')){{ Session::get('users')->no_telp }} @endif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="" class="btn btn-primary">Ubah</a>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Footer -->
    <div>
        <footer class="text-white" style=" background-color: #0081C9;" id="kontak">
            <div class="container text-center gap-3 p-3">
                <div class="row">
                    <div class="col">
                        <div>
                            <h1>Alamat</h1>
                        </div>
                        <br>
                        <div>
                            Jalan Uluwatu 2 Gang Tambak Sari No. 9
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h1>Layanan Kami</h1>
                        </div>
                        <br>
                        <div>
                            <a class="text-white" href="">Bersih Rumah</a>
                            <br>
                            <a class="text-white" href="">Tukang Elektronik</a>
                            <br>
                            <a class="text-white" href="">Tukang Kebun</a>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h1>Sosial Media Kami</h1>
                        </div>
                        <br>
                        <div class="d-flex justify-content-evenly">
                            <div>
                                <a href="#"><img src="image/icon/map.png" alt="" width="70"></a>
                            </div>
                            <div>
                                <a href="#"><img src="image/icon/email.png" alt="" width="70"></a>
                            </div>
                            <div>
                                <a href="#"><img src="image/icon/kontak.png" alt="" width="70"></a>
                            </div>
                            <div>
                                <a href="#"><img src="image/icon/instagram.png" alt="" width="70"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer -->
</body>

</html>
