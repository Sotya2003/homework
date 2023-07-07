@extends('home')

@section('head')
<link rel="stylesheet" href="/css/slideshow.css">
<script src="/js/slideshow.js"></script>
@endsection

@section('konten')

<!-- SlideShow -->
<div class="p-4">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="image/slide1.svg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
            </div>
            <div class="carousel-item">
                <img src="image/slide2.svg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
            </div>
            <div class="carousel-item active">
                <img src="image/slide3.svg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- SlideShow -->

<!--konten-->
<div>
    <div class="text-center">
        <h1>Mengapa Homework?</h1>
    </div>
    <br>
    <div class="container text-center">
        <div class="row align-items-center gap-5">
            <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
                <div>
                    <img src="image/icon/4300_7_03.png" alt="" width="100">
                </div>
                <div>
                    Berpengalaman
                </div>
            </div>
            <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
                <div>
                    <img src="image/icon/hand-holding-a-phone-to-take-a-selfie-pic.png" alt="" width="100">
                </div>
                <div>
                    Menghemat Waktu Dan Biaya
                </div>
            </div>
            <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
                <div>
                    <img src="image/icon/cash.png" alt="" width="100">
                </div>
                <div>
                    Kebersihan Terjamin
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container text-center pb-5">
    <div class="row align-items-center gap-5">
        <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
            <div>
                <img src="image/icon/dompetAsset 1.png" alt="" width="150">
            </div>
            <div>
                Harga Terjangkau
            </div>
        </div>
        <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
            <div>
                <img src="image/icon/5607.png" alt="" width="50">
            </div>
            <div>
                Kemudahan Akses
            </div>
        </div>
        <div class="d-flex justify-content-around col border align-items-center p-2 rounded shadow">
            <div>
                <img src="image/icon/46776.png" alt="" width="100">
            </div>
            <div>
                Professional
            </div>
        </div>
    </div>
</div>
<!--konten-->

@endsection
