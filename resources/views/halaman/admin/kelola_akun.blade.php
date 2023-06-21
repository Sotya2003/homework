@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- Kelola Akun -->
@if(Session::get('edit_success'))
    <div class="alert alert-success text-center">
        {{ Session::get('success') }} Data Berhasil Diubah.
    </div>
@endif

<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">HP</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Alat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->email }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>{{ $item->permission }}</td>
                <td>
                    <div>
                        <a href="/edit?email={{ $item->email }}" type="button" class="btn btn-warning">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Kelola Akun -->
@endsection
