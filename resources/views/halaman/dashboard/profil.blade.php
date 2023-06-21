@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- profil akun -->
<div class="p-5">
    <div class="d-flex justify-content-center align-items-center gap-5">
        <div class="mb-3 text-center">
            <img src="{{ asset('storage/'.$img->img) }}" alt="gambar" class="shadow-lg p-3 mb-5 bg-body-tertiary rounded" width="200">
        </div>
        <div class="flex-fill">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ID</label>
                <input type="number" class="form-control" id="exampleInputPassword1" value="{{ Session::get('users')->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ Session::get('users')->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">HP</label>
                <input name="hp" type="number" class="form-control" id="exampleInputPassword1" value="{{ Session::get('users')->no_telp }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="exampleInputPassword1"
                    value="{{ Session::get('users')->permission }}" disabled>
            </div>
            <div class="mb-3">
                <a href="" type="submit" class="btn btn-primary">Ubah Akun</a>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $errors)
                {{$errors}}
            @endforeach
        </div>
    @endif
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input name="img_1" type="file">
        <br>
        <br>
        <button type="submit">
            upload gambar
        </button>
    </form>
</div>
<!-- profil akun -->
@endsection
