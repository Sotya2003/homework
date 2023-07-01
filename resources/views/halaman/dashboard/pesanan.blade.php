@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- pesanan -->
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Invoice ID</th>
            <th scope="col">Layanan</th>
            <th scope="col">Total</th>
            <th scope="col">Status Pengerjaan</th>
            <th scope="col">Status Pembayaran</th>
            @if (Session::get('users')->permission=='worker')
                <th scope="col">Durasi</th>
            @endif
            <th scope="col">Alat</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach($data as $item)
            @if ($item->service_status!=='complete' or $item->paid_status=='Unpaid')
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        @if($item->item=='bersih_rumah') Bersih Rumah @endif
                        @if($item->item=='perbaikan_elektronik') Perbaikan Elektronik @endif
                        @if($item->item=='tukang_kebun') Tukang Kebun @endif
                    </td>
                    <td>Rp. {{ number_format($item->total_price,0,',','.') }}</td>
                    <td>
                        @if($item->service_status == 'processing')
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning text-white">
                                Diproses
                            </button>
                        @endif
                        @if($item->service_status == 'ontheway')
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning text-white">
                                Dalam Perjalanan
                            </button>
                        @endif
                        @if($item->service_status == 'working')
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning text-white">
                                Pengerjaan
                            </button>
                        @endif
                        @if($item->service_status == 'complete')
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success text-white">
                                Selesai
                            </button>
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
                    @if (Session::get('users')->permission=='worker')
                        <td>
                            {{$item->qty}} Jam
                        </td>
                    @endif
                    <td>
                        @if ($item->paid_status == 'Unpaid' && Session::get('users')->permission=='user')
                            <a href="/dashboard/invoice?id={{$item->id}}" class="btn btn-primary">
                                Bayar
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                Batalkan
                            </button>
                        @endif
                        @if ($item->paid_status == 'Paid' or Session::get('users')->permission=='worker' or Session::get('users')->permission=='admin')
                        <a href="/dashboard/invoice?id={{$item->id}}">
                                <div class="btn btn-primary">
                                    Lihat
                                </div>
                            </a> 
                        @endif
                        
                        @if (Session::get('users')->permission=='worker' && $item->service_status=='processing')
                            <a class="btn btn-warning" href="?id={{$item->id}}&email={{$item->email}}&worker={{$item->worker}}&service_status={{$item->service_status}}">
                                Berangkat
                            </a>  
                        @endif

                        @if (Session::get('users')->permission=='worker' && $item->service_status=='ontheway')
                            <a class="btn btn-success" href="?id={{$item->id}}&email={{$item->email}}&worker={{$item->worker}}&service_status={{$item->service_status}}">
                                Kerjakan
                            </a>  
                        @endif

                        @if (Session::get('users')->permission=='worker' && $item->service_status=='working')
                            <a class="btn btn-success" href="?id={{$item->id}}&email={{$item->email}}&worker={{$item->worker}}&service_status={{$item->service_status}}">
                                Selesai
                            </a>  
                        @endif
                    </td>
                </tr>
                <!-- invoice Modal -->
                <div class="modal fade" id="cancel_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg bg-white">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Batalkan Pesanan</h1>
                                <i class="fa-solid fa-xmark fa-2xl" data-bs-dismiss="modal" style="color: #ff0000;"></i>
                            </div>
                            <div class="modal-body">
                                Anda yakin untuk membatalkan pesanan ini?
                                <a class="btn btn-danger" href="/dashboard/cancel?id={{$item->id}}">
                                    Batalkan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- invoice Modal -->
  
                <!-- status Modal -->
                <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pesanan</h1>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            </div>

                            @if ($item->service_status=='processing')
                                <div class="modal-body">
                                    <div class="">
                                        Diproses <i class="fa-solid fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                            @endif

                            @if ($item->service_status=='ontheway')
                                <div class="modal-body">
                                    <div class="">
                                        Diproses <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Perjalanan <i class="fa-solid fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                            @endif

                            @if ($item->service_status=='working')
                                <div class="modal-body">
                                    <div class="">
                                        Diproses <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Perjalanan <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Proses Pengerjaan <i class="fa-solid fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                            @endif

                            @if ($item->service_status=='complete' && $item->paid_status=='Unpaid')
                                <div class="modal-body">
                                    <div class="">
                                        Diproses <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Perjalanan <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Proses Pengerjaan <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Menunggu Pembayaran <i class="fa-solid fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                            @endif

                            @if ($item->service_status=='complete' && $item->paid_status=='Paid')
                                <div class="modal-body">
                                    <div class="">
                                        Diproses <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Perjalanan <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Dalam Proses Pengerjaan <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>

                                <div class="modal-body">
                                    <div class="">
                                        Selesai dan Sudah Dibayar <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            @endif

                            <div class="modal-footer">
                                <div>
                                    <a href="/dashboard/invoice?id={{$item->id}}" class="btn btn-primary">
                                        Lihat Invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- status Modal -->
            @endif
        @endforeach
    </tbody>
</table>
<!-- pesanan -->
@endsection
