@extends('home')

@section('konten')
<!-- Form pesanan -->
{{ Session::flash('pesanan') }}
<div class="p-5">
    <div class="p-3 border rounded text-white" style="background-color: #0081C9;">
        <div class="text-center">
            <h1>PESANAN</h1>
        </div>
        @if(Session::get('error'))
            <div class="alert alert-danger text-center">
                Terdapat Tagihan Yang Belum Dibayarkan.
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
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ Session::get('users')->name}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ Session::get('users')->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input name="phone" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ Session::get('users')->no_telp }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Pesanan</label>
                <select name="pesanan" class="form-select" aria-label="Default select example">
                    <option @if(Session::get('layanan')=='bersih_rumah' )selected @endif value="bersih_rumah">Bersih
                        Rumah
                    </option>
                    <option @if(Session::get('layanan')=='perbaikan_elektronik' )selected @endif
                        value="perbaikan_elektronik">Perbaikan Elektronik</option>
                    <option @if(Session::get('layanan')=='tukang_kebun' )selected @endif value="tukang_kebun">Tukang
                        Kebun
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Durasi</label>
                <input name="durasi" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Per Jam" value="1">
                <div id="emailHelp" class="form-text text-white">Per Jam</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="d-flex justify-content-around">
                <div>
                    <button type="submit" class="btn btn-dark">Pesan Sekarang</button>
                </div>
                <div>
                    <a href="/layanan" class="text-white btn btn-warning">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Form pesanan -->
@endsection
