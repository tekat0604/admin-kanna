@extends('part.layout')
@section('content')
@include('part.header')
<div class="container-fluid">
@php
    $total_masuk  = $grandMasuk-$grandKeluar;
    $total_bersih = $grandBersih-$grandKeluar;
@endphp
    <!-- Content Row -->
    <div class="row animate__animated animate__bounceInLeft">
        <div class="col-lg-3 mb-4">
            <div class="card bg-gray-100 py-2">
                <div class="card-body pt-4">
                    <p class="mb-3">Produk <b>perlu dibuat</b></p>
                    @foreach ($j_produkkirim as $index => $pr)
                    <div class="row no-gutters align-items-center mb-3">
                        @if ($pr->id == 1)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-warning w-100 rata-kiri garis-belakang" style="color:#333 !important">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>
                        @elseif ($pr->id == 2)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-kanna text-white w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>
                        @elseif ($pr->id == 3)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-danger text-white w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>
                        @elseif ($pr->id == 4)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-info text-white w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>                             
                        @elseif ($pr->id == 5)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-success text-white w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>                                                         
                        @elseif ($pr->id == 6)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-gray-800 text-white w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>                             
                        @elseif ($pr->id == 7)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka bg-white text-dark w-100 rata-kiri garis-belakang">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>     
                        @elseif ($pr->id == 8)
                            <div class="col-md-10 rata-kiri">
                                <div class="px-3 box-angka text-dark w-100 rata-kiri garis-belakang" style="background-color: #6610f2; color:#fff !important;">
                                    <div class="text-xs mr-2">{{ $loop->iteration }}.</div>
                                    <div class="text-xs">
                                        {{ $pr->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 rata-kanan">
                                <h4 class="m-0 font-weight-bold">
                                    {{ $pr->perlu_kirim_count ?? 0 }}
                                </h4>
                            </div>                                               
                        @endif      
                    </div>
                    @endforeach   
                </div>
            </div>
        </div>  
        <div class="col-lg-9 mb-4">
            <div class="row">
                <div class="col-md-4 col-12 mb-4">
                    <div class="card bg-gray-100 py-2">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-12 col-md-12 col-12 rata">
                                    <div class="rata-kiri">
                                        <div class="card-icon bg-info">
                                            <i class="fas fa-sync-alt fa-2x"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-xs m-0">Perbarui <b>Data</b><br>otomatis</p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info shadow">
                                        Perbarui
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12 mb-4 ">
                    <div class="card bg-gray-100 py-2">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-6 col-12 rata-kiri">
                                    <div class="card-icon bg-kanna">
                                        <i class="fas fa-file-upload fa-2x"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs m-0">Perbarui <b>Data</b><br>Manual</p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12">
                                    <form action="{{ route('import-excel') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="rata-kanan text-center">
                                            <div class="custom-file mr-2">
                                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile" style="text-align:left;">Pilih file excel</label>
                                            </div>
                                            <button type="sumbit" class="btn btn-kanna shadow">
                                                Import
                                            </button>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card bg-gray-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                 <div class="col-auto text-center rata-kiri pr-2">
                                    <div class="card-icon bg-orange mr-2">
                                        <i class="fas fa-cubes fa-2x"></i>
                                    </div>
                                    <div class="text-xs m-0">
                                        Produk<br>Dibuat
                                    </div>
                                 </div>
                                 <div class="col h-100">
                                    <div class="rata-tengah">
                                        <div class="px-3 text-center" style="border-left: 1px solid #555; border-right: 1px solid #555;">
                                            <div class="text-xs mb-1">
                                                {{ \Carbon\Carbon::now()->translatedFormat('Y') }}
                                            </div>
                                            <h4 class="m-0 font-weight-bold">
                                                @php
                                                    $totalbuat2025 =  $j_buat2025->sum('total_buat2025');
                                                    $totalbuat     =  $j_buat->sum('total_buat');
                                                @endphp
                                                {{ number_format($totalbuat2025, 0, ',', '.') }}
                                            </h4>
                                        </div>
                                        <div class="pl-3 text-center">
                                            <div class="text-xs mb-1">
                                                Total
                                            </div>
                                            <h4 class="m-0 font-weight-bold">
                                                {{ number_format($totalbuat, 0, ',', '.') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card bg-gray-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                 <div class="col-auto text-center rata-kiri pr-2">
                                    <div class="card-icon bg-danger mr-2">
                                        <i class="fas fa-list fa-2x"></i>
                                    </div>
                                    <div class="text-xs m-0">
                                        Order<br>Masuk
                                    </div>
                                 </div>
                                 <div class="col h-100">
                                    <div class="rata-tengah">
                                        <div class="px-3 text-center" style="border-left: 1px solid #555; border-right: 1px solid #555;">
                                            <div class="text-xs mb-1">
                                                {{ \Carbon\Carbon::now()->translatedFormat('Y') }}
                                            </div>
                                            <h4 class="m-0 font-weight-bold">
                                                {{ number_format($j_order2025, 0, ',', '.') }}
                                            </h4>
                                        </div>
                                        <div class="pl-3 text-center">
                                            <div class="text-xs mb-1">
                                                Total
                                            </div>
                                            <h4 class="m-0 font-weight-bold">
                                                {{ number_format($j_ordertotal, 0, ',', '.') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card bg-gray-100 h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs mb-1">Margin Keuntungan
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        @php
                                            $persen=number_format(($total_bersih/$grandTotal)*100, 0, ',', '');
                                        @endphp
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold ">{{ $persen }}%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: {{ $persen }}%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="card-icon bg-info">
                                        <i class="fas fa-balance-scale fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4">
                    <div class="card bg-gray-100 py-2 rata-tengah" style="height:260px">
                        <div class="card-body w-100">
                            <div class="rata no-gutters align-items-center job job-list-light mb-2 pb-2">
                                <div class="rata-kiri">
                                    <div class="card-icon bg-info mr-2">
                                        <i class="fas fa-truck fa-2x"></i>
                                    </div>
                                    <p class="text-xs m-0"><b>Pesanan</b><br>Perlu Dikirim</p>
                                </div>
                                <div class="">
                                    <h3 class="mb-0 font-weight-bold mr-3">{{ $j_order }}</h3>
                                </div>
                            </div>
                            <div class="rata no-gutters align-items-center job job-list-light mb-2 pb-2">
                                <div class="rata-kiri">
                                    <div class="card-icon bg-danger mr-2">
                                        <i class="fas fa-cubes fa-2x"></i>
                                    </div>
                                    <p class="text-xs m-0"><b>Produk</b><br>Perlu Dibuat</p>
                                </div>
                                <div class="">
                                    <h3 class="mb-0 font-weight-bold mr-3">{{ $j_produk }}</h3>
                                </div>
                            </div>
                           <div class="rata no-gutters align-items-center job job-list-light mb-2 pb-2">
                                <div class="rata-kiri">
                                    <div class="card-icon mr-2" style="background-color:#964B00">
                                        <i class="fas fa-box fa-2x"></i>
                                    </div>
                                    <p class="text-xs m-0"><b>Pack Kayu</b><br>Perlu Dibuat</p>
                                </div>
                                <div class="">
                                    <h3 class="mb-0 font-weight-bold mr-3">{{ $j_produk }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-8">
                    <div class="card bg-gray-100" style="height:260px">
                        <div class="card-body rata-tengah">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col-lg-2 rata-tengah">
                                    <div>
                                        <div class="rata-tengah">
                                            <div class="card-icon bg-success rata-tengah">
                                                <i class="fas fa-dollar fa-2x"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <p class="text-xs m-0">Keuntungan</p>
                                            <h5 class="m-0 font-weight-bold">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 text-right" style="border-right: 1px solid #555;">
                                    <div class="px-4 mb-3">
                                        <div class="pb-3" style="border-bottom: 1px solid #555;">
                                            <div class="text-xs mb-1">
                                                Untung Kotor
                                            </div>
                                            <h5 class="m-0 font-weight-bold">
                                                Rp. {{ number_format($grandTotal, 0, ',', '.') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-4 mb-3">
                                        <div class="pb-3" style="border-bottom: 1px solid #555;">
                                            <div class="text-xs mb-1">
                                                Pot. Shopee
                                            </div>
                                            <h5 class="m-0 font-weight-bold">
                                                Rp. {{ number_format($grandPotongan, 0, ',', '.') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <div>
                                            <div class="text-xs mb-1">
                                                Kulakan
                                            </div>
                                            <h5 class="m-0 font-weight-bold">
                                                Rp. {{ number_format($grandKeluar, 0, ',', '.') }}
                                            </h5>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-5 text-right">
                                    <div class="">
                                        <div class="px-4 mb-3">
                                            <div class="pb-3" style="border-bottom: 1px solid #555;">
                                                <div class="text-xs mb-1">
                                                    Uang Masuk <b>Kotor</b>
                                                </div>
                                                <h5 class="m-0 font-weight-bold">
                                                    Rp. {{ number_format($grandMasuk, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="px-4 mb-3">
                                            <div>
                                                <div class="text-xs mb-1">
                                                    Uang Masuk <b>Bersih</b>
                                                </div>
                                                <h5 class="m-0 font-weight-bold">
                                                    Rp. {{ number_format($total_masuk, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="px-4 rata-kanan">
                                            <div class="px-3 box-angka bg-success text-white shadow-dark text-right">
                                                <div class="text-center ">
                                                    <p class="m-0">Untung Bersih</p>
                                                    <h4 class="m-0 font-weight-bold">Rp.{{ number_format($total_bersih, 0, ',', '.') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-gray-100 mb-4">
                <div class="card-body">
                    <div class="row job job-list-light m-0 mb-2">
                        <div class="col-md-3 mb-3">
                            <div class="rata-kanan w-100">
                                <input type="text" class="form-control" id="searchTable" placeholder="Cari No Pesanan">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-produk mb-3" id="tablelayanan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th>Status</th>
                                    <th>No Pesanan</th>
                                    <th>Customer</th>
                                    <th>Pesan</th>
                                    <th>Deadline</th>
                                    <th>Nama Barang</th>
                                    <th>Variasi</th>
                                    <th><center>Jumlah<center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($groupedOrders as $no_pesan => $orders)
                                    @foreach ($orders as $index => $or)
                                    <tr>
                                        @if ($index === 0)
                                            <td rowspan="{{ count($orders) }}"><center>{{ $no++ }}.</center></td>
                                            <td rowspan="{{ count($orders) }}">
                                                @if($or->status == 'Perlu Dikirim')
                                                    <badge class="badge badge-danger" style="padding: 7px">{{ $or->status }}</badge>
                                                @elseif($or->status == 'Dikirim')
                                                    <badge class="badge badge-info" style="padding: 7px">{{ $or->status }}</badge>
                                                @else
                                                    <badge class="badge badge-success" style="padding: 7px">{{ $or->status }}</badge>
                                                @endif
                                            </td>
                                            <td rowspan="{{ count($orders) }}">{{ $or->no_pesan }}</td>
                                            <td rowspan="{{ count($orders) }}">{{ $or->nama }}</td>
                                            <td rowspan="{{ count($orders) }}">{{ date("d-m-y", strtotime($or->tgl_pesan)) }}</td>
                                            <td rowspan="{{ count($orders) }}">{{ date("d-m-y", strtotime($or->tgl_deadline)) }}</td>
                                        @endif
                                        @php
                                            $namaResmi = $produkList[$or->produk] ?? $or->produk;
                                        @endphp
                                        <td>{{ $namaResmi }}</td>
                                        <td>{{ $or->variasi }}</td>
                                        <td style="text-align:center">{{ $or->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                                    
        </div>
    </div>
</div>
@endsection