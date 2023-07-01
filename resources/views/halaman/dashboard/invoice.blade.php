<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Invoice</title>
</head>
<body>
    <div class="container p-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            @if($data->paid_status == 'Paid')
                                <h4 class="float-end font-size-15">Invoice ID-{{ $data->id }} <span
                                        class="badge bg-success font-size-12 ms-2">Sudah Dibayar</span></h4>
                            @endif
                            @if($data->paid_status == 'Unpaid')
                                <h4 class="float-end font-size-15">Invoice ID-{{ $data->id }} <span
                                        class="badge bg-danger font-size-12 ms-2">Belum Dibayar</span></h4>
                            @endif
                            <div class="mb-4">
                                <img src="/image/logofull.png" alt="" width="200">
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">Jalan Uluwatu 2 Gang Tambak Sari No. 9</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> bali-homework.com</p>
                                <p><i class="uil uil-phone me-1"></i> +62 812 3666 7854</p>
                            </div>
                        </div>
    
                        <hr class="my-4">
    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Pembayaran kepada:</h5>
                                    <h5 class="font-size-15 mb-2">{{ $data->name }}</h5>
                                    <p class="mb-1">{{ $data->address }}</p>
                                    <p class="mb-1">{{ $data->email }}</p>
                                    <p>{{ $data->phone }}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>{{ $data->created_at }}</p>
                                        <h5 class="font-size-15 mb-1">Dikerjakan Oleh:</h5>
                                        <p>{{ $data->worker }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
    
                        <div class="py-2">
                            <h5 class="font-size-15">Pemesanan Layanan</h5>
    
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                            <th>Durasi</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">
                                                        @if($data->item=='bersih_rumah') Bersih Rumah @endif
                                                        @if($data->item=='perbaikan_elektronik') Perbaikan Elektronik @endif
                                                        @if($data->item=='tukang_kebun') Tukang Kebun @endif
                                                    </h5>
                                                </div>
                                            </td>
                                            <td>Rp. {{ number_format($data->price,0,',','.') }}</td>
                                            <td>{{ $data->qty }} Jam</td>
                                            <td class="text-end">Rp. {{ number_format($data->total_price,0,',','.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Diskon :</th>
                                            <td class="border-0 text-end">- Rp. 0</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">{{ number_format($data->total_price,0,',','.') }}</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    
                                        @if (Session::get('users')->permission=='user' && $data->paid_status=='Unpaid')
                                            <button id="pay-button" class="btn btn-primary w-md">Bayar Sekarang</button>
                                        @endif
                                        <script type="text/javascript">
                                            // For example trigger on button clicked, or any time you need
                                            var payButton = document.getElementById('pay-button');
                                            payButton.addEventListener('click', function () {
                                              // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                                              window.snap.pay('{{$data->paymentToken}}', {
                                                onSuccess: function(result){
                                                  /* You may add your own implementation here */
                                                  window.location.reload();
                                                },
                                                onPending: function(result){
                                                  /* You may add your own implementation here */
                                                  alert("Menunggu Pembayaran"); console.log(result);
                                                },
                                                onError: function(result){
                                                  /* You may add your own implementation here */
                                                  alert("Pembayaran Gagal"); console.log(result);
                                                },
                                                onClose: function(){
                                                  /* You may add your own implementation here */
                                                  alert('Yakin untuk tidak melanjutkan?');
                                                }
                                              })
                                            });
                                        </script>
                                        <a class="btn btn-warning w-md" href="javascript:history.back()">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
</body>
</html>