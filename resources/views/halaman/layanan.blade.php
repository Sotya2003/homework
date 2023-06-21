@extends('home')

@section('konten')
<!-- pesan -->
<div class="toast-container position-fixed bottom-50 end-0 p-3 notif alert fs-3">
    @if (Session::get('worker_fail'))
        <div class="alert alert-danger">
            Tidak ada Pekerja yang tersedia. Silahkan coba beberapa menit lagi. 
        </div>
    @endif
</div>
<!-- pesan -->

<!-- Layanan Kami -->
<div>
    <div class="text-center pt-4">
        <h1>Layanan Kami</h1>
    </div>
    <br>
    <div class="container text-center">
        <div class="row align-items-center gap-5">
            <div class="col border align-items-center p-2 rounded shadow">
                <div>
                    <h1>Bersih Rumah</h1>
                </div>
                <br>
                <div>
                    <img src="image/cleaning_male.png" alt="" width="250">
                </div>
                <br>
                <div>
                    <a class="text-white" href="/pesan?layanan=bersih_rumah">
                        <h1 class="bg-primary rounded p-1">Pilih Layanan</h1>
                    </a>
                </div>
            </div>
            <div class="col border align-items-center p-2 rounded shadow">
                <div>
                    <h1>Tukang Elektronik</h1>
                </div>
                <br>
                <div>
                    <img src="image/ac.png" alt="" width="300">
                </div>
                <br>
                <div>
                    <a class="text-white" href="/pesan?layanan=perbaikan_elektronik">
                        <h1 class="bg-primary rounded p-1">Pilih Layanan</h1>
                    </a>
                </div>
            </div>
            <div class="col border align-items-center p-2 rounded shadow">
                <div>
                    <h1>Tukang Kebun</h1>
                </div>
                <br>
                <div>
                    <img src="image/tukang_kebun.png" alt="" width="350">
                </div>
                <br>
                <div>
                    <a class="text-white" href="/pesan?layanan=tukang_kebun">
                        <h1 class="bg-primary rounded p-1">Pilih Layanan</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Layanan Kami -->
@endsection
