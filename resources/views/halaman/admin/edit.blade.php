@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- Edit akun -->
<div class="p-5">
    <form action="" method="post">
        @foreach(Session::get('edit_data') as $item)
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ID</label>
                <input type="number" class="form-control" id="exampleInputPassword1" value="{{ $item->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $item->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">HP</label>
                <input name="phone" type="number" class="form-control" id="exampleInputPassword1" value="{{ $item->no_telp }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="exampleInputPassword1" value="{{ $item->permission }}">
            </div>
            <button type="submit" class="btn btn-primary">Ubah Akun</button>
            <a href="/dashboard/kelola-akun" type="button" class="btn btn-primary">Kembali</a>
        @endforeach
    </form>
</div>

<!-- Edit akun -->
@endsection
