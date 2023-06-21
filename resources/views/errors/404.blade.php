<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Custom Error Page Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="alert alert-danger text-center">
            <h2 class="display-3">404</h2>
            <div>01000001 01010011 01010101</div>
            <p class="display-5">Eitss, Mau Kemana Hayoo!. <a style="text-decoration:none;" href="/home">Klik Disini Untuk Kembali.</a></p>
            <div>
                Terjadi Kesalahan Dikarenakan :
                <br>
                > Halaman tidak ditemukan.
                <br>
                > Sedang perbaikan.
            </div>
        </div>
    </div>
</body>
</html>