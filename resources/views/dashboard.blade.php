@extends('part.layout')
@section('content')
@include('part.header')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row animate__animated animate__bounceInLeft">
        <div class="col-lg-4 mb-4">
            <div class="card bg-gray-100 py-2">
                <div class="card-body ">
                    <div class="rowno-gutters align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 rata">
                            <div class="rata-kiri">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-sync-alt fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-xs m-0">Perbarui otomatis</p>
                                    <h5 class="m-0 font-weight-bold">Data Pesanan</h5>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info shadow">
                                Perbarui Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-lg-8 mb-4">
            <div class="card bg-gray-100 py-2">
                <div class="card-body ">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-6 col-md-6 col-12 rata-kiri">
                            <div class="card-icon bg-kanna">
                                <i class="fas fa-file-upload fa-2x"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs m-0">Perbarui manual</p>
                                <h5 class="m-0 font-weight-bold">Data Pesanan</h5>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
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
        <div  class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gray-100 h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs mb-1">
                                Order Perlu Dikirim</div>
                            <div class="h5 mb-0 font-weight-bold ">{{ $j_order }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="card-icon bg-orange">
                                <i class="fas fa-truck fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-gray-100 h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-4 rata-kiri ">
                            <div class="card-icon bg-success mr-2">
                                <i class="fas fa-dollar fa-2x"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs m-0">Keuntungan</p>
                                <h5 class="m-0 font-weight-bold">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-8 rata-kanan text-right">
                            <div class="px-3" style="border-right: 1px solid #555;">
                                <div class="text-xs mb-1">
                                    Kotor
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    Rp. {{ number_format($grandTotal, 0, ',', '.') }}
                                </h5>
                            </div>
                            <div class="px-3">
                                <div class="text-xs mb-1">
                                    Bersih
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    Rp.{{ number_format($grandBersih, 0, ',', '.') }}
                                </h5>
                            </div>
                            {{-- <div class="px-3" style="border-right: 1px solid #555;">
                                <div class="text-xs mb-1">
                                    Kulakan
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    Rp. {{ number_format($grandKeluar, 0, ',', '.') }}
                                </h5>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div  class="card bg-gray-100 h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs mb-1">Margin Keuntungan
                            </div>
                            <div class="row no-gutters align-items-center">
                                @php
                                    $persen=number_format(($grandBersih/$grandTotal)*100, 0, ',', '');
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
                                    <th>Pesan</th>
                                    <th>Deadline</th>
                                    <th>Nama Barang</th>
                                    <th>Variasi</th>
                                    <th><center>Jumlah<center></th>
                                    <th>Customer</th>
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
                                            <td rowspan="{{ count($orders) }}">{{ date("d-m-y", strtotime($or->tgl_pesan)) }}</td>
                                            <td rowspan="{{ count($orders) }}">{{ date("d-m-y", strtotime($or->tgl_deadline)) }}</td>
                                        @endif
                        
                                        <td>{{ $or->produk }}</td>
                                        <td>{{ $or->variasi }}</td>
                                        <td style="text-align:center">{{ $or->jumlah }}</td>
                        
                                        @if ($index === 0)
                                            <td rowspan="{{ count($orders) }}">{{ $or->nama }}</td>
                                        @endif
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