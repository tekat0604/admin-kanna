@extends('part.layout')
@section('content')
@include('part.header')

<div class="container-fluid">
<!-- Content Row -->
    <div class="row"> 
        <div class="col-lg-4 col-12 mb-4"> 
            <div class="card bg-gray-100 px-3" style="height:275px">
                <div class="card-body rata-tengah">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-12 col-md-6 col-12 rata mb-3 pb-3 job job-list-light">
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
                        <div class="col-lg-12 col-md-6 col-12 job job-list-light">
                            <div class="rata-kiri mb-3">
                                <div class="card-icon bg-kanna">
                                    <i class="fas fa-file-upload fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-xs m-0">Perbarui manual</p>
                                    <h5 class="m-0 font-weight-bold">Data Pesanan</h5>
                                </div>
                            </div>
                            <div class="">
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
        </div>
        <div class="col-lg-2 col-12 mb-4">
            <div class="card bg-gray-100 rata-tengah" style="height:275px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-12 text-center">
                            <div class="px-3 mb-2 pb-2 job job-list-light">
                                <div class="text-xs mb-1">
                                    Perlu Dikirim
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    {{ $jml_perlukirim }}
                                </h5>
                            </div>
                            <div class="px-3 mb-2 pb-2 job job-list-light">
                                <div class="text-xs mb-1">
                                    Dikirim
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    {{ $jml_dikirim }}
                                </h5>
                            </div>
                            <div class="px-3 mb-2">
                                <div class="text-xs mb-1">
                                    Selesai
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    {{ $jml_selesai }}
                                </h5>
                            </div>
                            <div class="px-3 box-angka bg-orange text-white shadow-dark text-center">
                                <p class="m-0"><b>Total</b></p>
                                <h4 class="m-0 font-weight-bold">{{ $jml_total }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-6 col-12 mb-4">
            <div class="card bg-gray-100" style="height:275px">
                <div class="card-body rata-tengah">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col-lg-2">
                            <div class="card-icon bg-success">
                                <i class="fas fa-dollar fa-2x"></i>
                            </div>
                        </div>
                        <div class="col-lg-5 text-right" style="border-right: 1px solid #555;">
                            @php
                                $total_masuk  = $grandMasuk-$grandKeluar;
                                $total_bersih = $grandBersih-$grandKeluar;
                            @endphp
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
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card bg-gray-100 mb-4">
                <div class="card-body">
                    <div class="row job job-list-light m-0 mb-2">
                        <div class="col-md-3 mb-3">
                            <div class="rata-kanan w-100">
                                <input type="text" class="form-control" id="searchTable" placeholder="Cari No Pesanan">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="rata-tengah w-100">
                                <label class="m-0 mr-2">Filter Status</label>
                                <select id="filterStatus" class="form-control" style="max-width: 300px">
                                    <option value="">Pilih status pesanan</option>
                                    <option value="Perlu Dikirim">Perlu Dikirim</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-md-5 mb-4">
                            <form action="{{ route('order.index') }}" method="GET">
                                @csrf
                                <div class="rata-kanan w-100 d-flex">
                                    <label class="m-0 mr-2">Filter tanggal</label>
                                    @php
                                        use Carbon\Carbon;

                                        Carbon::setLocale('id');
                                        $bulanAktif = request('bulan', date('m'));
                                        $namaBulan = Carbon::createFromFormat('m', $bulanAktif)->translatedFormat('F');
                                    @endphp
                                    <select name="bulan" class="form-control mr-3" style="max-width: 180px">
                                        <option value="">Pilih Bulan</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            @php
                                                $bulan = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                $namaBulan = Carbon::createFromFormat('m', $bulan)->translatedFormat('F');
                                            @endphp
                                            <option value="{{ $bulan }}"
                                                {{ request('bulan', date('m')) == $bulan ? 'selected' : '' }}>
                                                {{ ucfirst($namaBulan) }}
                                            </option>
                                        @endfor
                                    </select>
                                    <select name="tahun" class="form-control mr-3" style="max-width: 100px">
                                        <option value="">Pilih Tahun</option>
                                        @foreach (range(date('Y'), 2022) as $year)
                                            <option value="{{ $year }}" {{ request('tahun', date('Y')) == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endforeach
                                    </select> 
                                    <button type="submit" class="btn btn-kanna shadow">Terapkan</button>
                                </div>
                            </form>    
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
                                    <th>Total</th>
                                    <th>Potong</th>
                                    <th>Bersih</th>
                                    <th>Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($groupedOrders as $no_pesan => $orders)
                                    @foreach ($orders as $index => $or)
                                    <tr @if($index === 0) data-status="{{ strtolower($or->status) }}" @endif>
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
                                        @php
                                            $total    = $or->harga*$or->jumlah;
                                            $potongan = intval((7.5*$total/100)+(2.25*$total/100)+(1.4*$total/100)+(4*$total/100));
                                            $bersih   = $total - $potongan;
                                            $total_bersih += $bersih;
                                        @endphp
                                        <td style="text-align:right">{{ number_format($total, 0, ',', '.') }}</td>
                                        <td style="text-align:right">{{ number_format($potongan, 0, ',', '.') }}</td>
                                        <td style="text-align:right">{{ number_format($bersih, 0, ',', '.') }}</td>
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