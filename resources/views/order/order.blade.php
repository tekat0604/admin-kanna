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
                        <div class="col-lg-2 rata-tengah">
                           <div>
                                <div class="rata-tengah">
                                    <div class="card-icon bg-success rata-tengah">
                                        <i class="fas fa-dollar fa-2x"></i>
                                    </div>
                                </div>
                                @php
                                    use Carbon\Carbon;

                                    $bulanDipilih = request('bulan', date('m')); // default ke bulan sekarang
                                    $tahunDipilih = request('tahun', date('Y')); // default ke tahun sekarang

                                    $namaBulan = Carbon::createFromFormat('m', $bulanDipilih)->translatedFormat('F');
                                @endphp
                                <div class="mt-2 text-center">
                                    <p class="text-xs m-0">Keuntungan</p>
                                    <h5 class="m-0 font-weight-bold">{{ ucfirst($namaBulan) }} {{ $tahunDipilih }}</h5>
                                </div>        
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
                        <table class="table table-striped table-produk mb-3" id="tablelayanan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th>Status</th>
                                    <th>No Pesanan</th>
                                    <th>Customer</th>
                                    <th>Pesan</th>
                                    <th>Nama Barang & Variasi</th>
                                    <th class="text-right">Jumlah</th>
                                    <th>Total</th>
                                    <th>Potong</th>
                                    <th>Bersih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($groupedOrders as $no_pesan => $orders)
                                    @php
                                        // Ambil order pertama untuk informasi umum
                                        $firstOrder = $orders[0];
                                        // Siapkan data produk, variasi, jumlah
                                        $produkListText = '';
                                        $jumlahListText = '';
                                        $hargaListText = '';
                                        $potongan = '';
                                        $total_bersih ='';
                                        $nom = 1;
                                        foreach ($orders as $or) {
                                            $namaResmi = $produkList[$or->produk] ?? $or->produk;
                                            $total=$or->harga*$or->jumlah;
                                            $potongan_harga = (7.5*$total/100)+(2.25*$total/100)+(1.4*$total/100)+(4*$total/100);
                                            $bersih = $total-$potongan_harga;

                                            $produkListText .= '<div class="row no-gutters job job-list-light mb-1 pb-2" style="height:50px">
                                                                    <div class="col rata-kiri">
                                                                        <p class="m-0 mr-3">'.$nom++.'.</p>
                                                                        <div>
                                                                            <p class="m-0 font-weight-bold">' .$namaResmi . '</p>
                                                                            <p class="m-0">'. $or->variasi .'</p>
                                                                        </div>
                                                                    </div>
                                                                </div>'; 
                                            $jumlahListText .= '<div class="job job-list-light mb-1 pb-2 rata-tengah" style="height:50px;">
                                                                    <p class="m-0">' . number_format($or->jumlah, 0, ',', '.') . '</p>
                                                                </div>';
                                            $hargaListText .= '<div class="job job-list-light mb-1 pb-2 rata-kanan" style="height:50px;">
                                                                    <p class="m-0">' . number_format($or->harga*$or->jumlah, 0, ',', '.') . '</p>
                                                                </div>';
                                            $potongan .= '<div class="job job-list-light mb-1 pb-2 rata-kanan" style="height:50px;">
                                                                    <p class="m-0">' . number_format($potongan_harga, 0, ',', '.') . '</p>
                                                                </div>';
                                            $total_bersih.='<div class="job job-list-light mb-1 pb-2 rata-kanan" style="height:50px;">
                                                                    <p class="m-0">' . number_format($bersih, 0, ',', '.') . '</p>
                                                                </div>';
                                        }
                                    @endphp
                                    <tr>
                                        <td><center>{{ $no++ }}.</center></td>
                                        <td>
                                            @if($firstOrder->status == 'Perlu Dikirim')
                                                <badge class="badge badge-danger" style="padding: 7px">{{ $firstOrder->status }}</badge>
                                            @elseif($firstOrder->status == 'Dikirim')
                                                <badge class="badge badge-info" style="padding: 7px">{{ $firstOrder->status }}</badge>
                                            @else
                                                <badge class="badge badge-success" style="padding: 7px">{{ $firstOrder->status }}</badge>
                                            @endif
                                        </td>
                                        <td>{{ $firstOrder->no_pesan }}</td>
                                        <td>{{ $firstOrder->nama }}</td>
                                        <td>{{ date("d-m-y", strtotime($firstOrder->tgl_pesan)) }}</td>
                                        <td class="pb-1">
                                            {!! $produkListText !!}
                                        </td>
                                         <td class="pb-1" style="text-align:right">{!! $jumlahListText !!}</td>
                                        <td class="pb-1" style="text-align:right">{!! $hargaListText !!}</td>
                                        <td style="text-align:right">{!! $potongan !!}</td>
                                        <td style="text-align:right">{!! $total_bersih !!}</td>
                                    </tr>
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