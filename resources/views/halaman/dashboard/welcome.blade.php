@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<div class="text-center">
    <h1>Selamat Datang <span class="text-primary">{{ Session::get('users')->email }}</span> Sebagai
        @if(Session::get('users')->permission=='user')
            <span class="text-success">User</span>
        @endif
        @if(Session::get('users')->permission=='worker')
            <span class="text-warning">Pekerja</span>
        @endif
        @if(Session::get('users')->permission=='admin')
            <span class="text-danger">ADMIN</span>
        @endif
    </h1>
</div>
@endsection
