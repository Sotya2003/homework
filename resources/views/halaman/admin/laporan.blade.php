@extends('halaman.dashboard.dashboard_master')
@section('dashboard')
<!-- laporan -->
<script>
    function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

<form action="" method="post" class="border border-danger rounded p-3">
    @csrf
    <div class="container text-center">
        <div class="row g-4 align-items-center">
            <div class="col-auto">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Tahun</span>
                    <input type="text" class="form-control" maxlength="4" size="4" name="year" value="{{Session::get('year')}}" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>
            <div class="col-auto">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Dari Bulan</span>
                    <select class="form-control text-center" id="month_before" name="month_before">
                        <option value="00" @if (Session::get('month_before')==0) selected @endif>Pilih >></option>
                        <option value="01" @if (Session::get('month_before')==1) selected @endif>Januari</option>
                        <option value="02" @if (Session::get('month_before')==2) selected @endif>Februari</option>
                        <option value="03" @if (Session::get('month_before')==3) selected @endif>Maret</option>
                        <option value="04" @if (Session::get('month_before')==4) selected @endif>April</option>
                        <option value="05" @if (Session::get('month_before')==5) selected @endif>Mei</option>
                        <option value="06" @if (Session::get('month_before')==6) selected @endif>Juni</option>
                        <option value="07" @if (Session::get('month_before')==7) selected @endif>Juli</option>
                        <option value="08" @if (Session::get('month_before')==8) selected @endif>Agustus</option>
                        <option value="09" @if (Session::get('month_before')==9) selected @endif>September</option>
                        <option value="10" @if (Session::get('month_before')==10) selected @endif>Oktober</option>
                        <option value="11" @if (Session::get('month_before')==11) selected @endif>November</option>
                        <option value="12" @if (Session::get('month_before')==12) selected @endif>Desember</option> 
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Sampai Bulan</span>
                    <select class="form-control text-center" id="month_after" name="month_after">
                        <option value="00" @if (Session::get('month_after')==0) selected @endif>Pilih >></option>
                        <option value="01" @if (Session::get('month_after')==1) selected @endif>Januari</option>
                        <option value="02" @if (Session::get('month_after')==2) selected @endif>Februari</option>
                        <option value="03" @if (Session::get('month_after')==3) selected @endif>Maret</option>
                        <option value="04" @if (Session::get('month_after')==4) selected @endif>April</option>
                        <option value="05" @if (Session::get('month_after')==5) selected @endif>Mei</option>
                        <option value="06" @if (Session::get('month_after')==6) selected @endif>Juni</option>
                        <option value="07" @if (Session::get('month_after')==7) selected @endif>Juli</option>
                        <option value="08" @if (Session::get('month_after')==8) selected @endif>Agustus</option>
                        <option value="09" @if (Session::get('month_after')==9) selected @endif>September</option>
                        <option value="10" @if (Session::get('month_after')==10) selected @endif>Oktober</option>
                        <option value="11" @if (Session::get('month_after')==11) selected @endif>November</option>
                        <option value="12" @if (Session::get('month_after')==12) selected @endif>Desember</option> 
                    </select>
                </div>
            </div>
            <button class="col btn btn-primary">
                Cari data
            </button>
        </div>
    </div>
</form>

@if (Session::get('error_month'))
    <div class="alert alert-danger text-center">
        Pilih Bulan Dengan Benar. 
    </div>
@endif

@if (Session::get('error_year'))
    <div class="alert alert-danger text-center">
        Masukan Tahun Dengan Benar. 
    </div>
@endif

@if (Session::get('laporan'))
    <div class="text-center mt-3">
        <a class="btn btn-success" href="javascript:void(0);" onclick="printPageArea('printableArea')">
            CETAK
        </a>
    </div>
    <div id="printableArea">
        <div class="text-center mb-3">
            <h1>
                Laporan Bulan
                <b>
                    @if (Session::get('month_before')==1)Januari @endif
                    @if (Session::get('month_before')==2)Februari @endif
                    @if (Session::get('month_before')==3)Maret @endif
                    @if (Session::get('month_before')==4)April @endif
                    @if (Session::get('month_before')==5)Mei @endif
                    @if (Session::get('month_before')==6)Juni @endif
                    @if (Session::get('month_before')==7)Juli @endif
                    @if (Session::get('month_before')==8)Agustus @endif
                    @if (Session::get('month_before')==9)September @endif
                    @if (Session::get('month_before')==10)Oktober @endif
                    @if (Session::get('month_before')==11)November @endif
                    @if (Session::get('month_before')==12)Desember @endif  
                </b>
                Sampai Dengan Bulan
                <b>
                    @if (Session::get('month_after')==1)Januari @endif
                    @if (Session::get('month_after')==2)Februari @endif
                    @if (Session::get('month_after')==3)Maret @endif
                    @if (Session::get('month_after')==4)April @endif
                    @if (Session::get('month_after')==5)Mei @endif
                    @if (Session::get('month_after')==6)Juni @endif
                    @if (Session::get('month_after')==7)Juli @endif
                    @if (Session::get('month_after')==8)Agustus @endif
                    @if (Session::get('month_after')==9)September @endif
                    @if (Session::get('month_after')==10)Oktober @endif
                    @if (Session::get('month_after')==11)November @endif
                    @if (Session::get('month_after')==12)Desember @endif
                </b>
               
                Tahun <b>{{Session::get('year')}}</b>.
            </h1>
        </div>

        <div class="p-2">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Invoice ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Session::get('data1') as $item)
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <table class="table table-bordered border-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">Layanan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Bersih Rumah
                        </td>
                        <td>
                            {{Session::get('data4')}}
                        </td>
                        <td>
                            Rp. {{number_format(Session::get('data4_1'),0,',','.')}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Perbaikan Elektronik
                        </td>
                        <td>
                            {{Session::get('data5')}}
                        </td>
                        <td>
                            Rp. {{number_format(Session::get('data5_1'),0,',','.')}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tukang Kebun
                        </td>
                        <td>
                            {{Session::get('data6')}}
                        </td>
                        <td>
                            Rp. {{number_format(Session::get('data6_1'),0,',','.')}}
                        </td>
                    </tr>
                </tbody>
                <thead>
                    <th scope="col">Jumlah Transaksi</th>
                    <th colspan="2" scope="col">{{Session::get('data2')}}</th>
                </thead>
                <thead>
                    <th scope="col">Total</th>
                    <th colspan="2" scope="col">Rp. {{number_format(Session::get('data3'),0,',','.')}}</th>
                </thead>
            </table>
        </div>
    </div>
@endif    

<!-- laporan -->
@endsection
