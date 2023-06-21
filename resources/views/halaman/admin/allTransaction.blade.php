@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- semua transaksi -->
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Invoice ID</th>
            <th scope="col">Email</th>
            <th scope="col">Layanan</th>
            <th scope="col">Total</th>
            <th scope="col">Status Pengerjaan</th>
            <th scope="col">Status Pembayaran</th>
            <th scope="col">Alat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <th scope="row">{{ $item->email }}</th>
                <td>
                    @if($item->item=='bersih_rumah') Bersih Rumah @endif
                    @if($item->item=='perbaikan_elektronik') Perbaikan Elektronik @endif
                    @if($item->item=='tukang_kebun') Tukang Kebun @endif
                </td>
                <td>Rp. {{ number_format($item->total_price,0,',','.')  }}</td>
                <td>
                    @if($item->service_status == 'processing')
                        <div class="">
                            Diproses
                        </div>
                    @endif
                    @if($item->service_status == 'ontheway')
                        <div class="">
                            Perjalanan
                        </div>
                    @endif
                    @if($item->service_status == 'working')
                        <div class="">
                            Pengerjaan
                        </div>
                    @endif
                    @if($item->service_status == 'complete')
                        <div class="">
                            Selesai
                        </div>
                    @endif
                </td>
                <td>
                    @if($item->paid_status == 'Unpaid')
                        <div class="btn btn-danger">
                            Belum Dibayar
                        </div>
                    @endif
                    @if($item->paid_status == 'Paid')
                        <div class="btn btn-success">
                            Sudah Dibayar
                        </div>
                    @endif
                </td>
                <td>
                    <a href="/dashboard/invoice?id={{$item->id}}">
                        <div class="btn btn-primary">
                            Lihat
                        </div>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- semua transaksi -->
@endsection
