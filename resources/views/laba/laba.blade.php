@extends('part.layout')
@section('content')
@include('part.header')

<div class="container-fluid">
<!-- Content Row -->
    <div class="row"> 
        <div class="col-lg-12 col-12 mb-4"> 
            <div class="card bg-gray-100">
                <div class="row card-body">
                    <div class="col-md-6 rata-kiri">
                        <div class="rata-tengah mr-3">
                            <div class="card-icon bg-grin rata-tengah">
                                <i class="fas fa-dollar fa-2x"></i>
                            </div>
                        </div>
                        <h5 class="m-0"> Data Order & Keuntungan <b>{{ request('tahun', date('Y')) }}</b></h5>
                    </div>
                    <div class="col-md-6 rata-kanan">
                        <form action="{{ route('laba') }}" method="GET">
                            @csrf
                            <div class="rata-kanan w-100 d-flex">
                                <label class="m-0 mr-2">Pilih Tahun</label>
                                <select name="tahun" class="form-control mr-3" style="max-width: 100px">
                                    <option value="">Pilih Tahun</option>
                                    @foreach (range(date('Y'), 2022) as $year)
                                        <option value="{{ $year }}" {{ request('tahun', date('Y')) == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select> 
                                <button type="submit" class="btn btn-kanna bg-gray-800 shadow" style="border-color: #5a5c69">Terapkan</button>
                            </div>                                
                        </form> 
                    </div>
                </div>
            </div>                    
        </div>
        @foreach ($ordersPerBulan as $bulan => $listOrder)
            @php
               $tahunDipilih = request('tahun', date('Y')); // default ke tahun sekarang
               $namaBulan = \Carbon\Carbon::createFromFormat('m', $bulan)
                            ->locale('id')->translatedFormat('F'); // nama bulan Indonesia

                // Hitung subtotal order
                $subtotal = 0;
                $subpotongan = 0;
                $subbersih = 0;
                foreach ($listOrder as $or) {
                    $total = $or->harga * $or->jumlah;
                    $potongan = intval((7.5 * $total / 100) + (2.25 * $total / 100) + (1.4 * $total / 100) + (4 * $total / 100));
                    $bersih = $total - $potongan;

                    $subtotal += $total;
                    $subpotongan += $potongan;
                    $subbersih += $bersih;
                }

                // Ambil pengeluaran bulan ini, default ke collection kosong jika tidak ada
                $pengeluaranList = $pengeluaranPerBulan[$bulan] ?? collect();

                // Hitung total pengeluaran bulan ini
                $totalPengeluaran = $pengeluaranList->sum('jumlah');

                // Hitung laba bersih = subbersih - totalPengeluaran
                $labaBersih = $subbersih - $totalPengeluaran;
            @endphp
            <div class="col-lg-12 no-gutters mb-2">
                <h4 class="m-0 font-weight-bold">
                    <i class="fas fa-circle text-grin mr-1 m-0" style="font-size: 14px"></i>
                    {{ ucfirst($namaBulan) }}
                </h4>   
            </div>      
            <div class="col-lg-12 col-12 mb-4">
                <div class="card bg-gray-100" style="height: 160px">
                    <div class="card-body rata-tengah">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-md-6 pr-3" style="border-right: 1px solid #555;">
                                <div class="px-3 mb-3">
                                    <div class="pb-3 rata" style="border-bottom: 1px solid #555;">
                                        <h5 class="m-0 font-weight-bold">Laba Rugi</h5>
                                        <div class="rata-kanan">
                                            <div class="text-xs m-0 mr-2">Untung Kotor</div>
                                            <h5 class="m-0 font-weight-bold">{{ number_format($subtotal, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3 mb-3 rata-kanan"> 
                                    <div class="mr-3 pr-3 text-right" style="width:25%; border-right: 1px solid #555;">
                                        <div class="text-xs mb-1 text-right">Margin Keuntungan
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            @php
                                                $persen=number_format(($labaBersih/$subtotal)*100, 0, ',', '');
                                            @endphp
                                            <div class="col-auto rata-kanan">
                                                <h5 class="mb-0 mr-2 font-weight-bold ">{{ $persen }}%</h5>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{ $persen }}%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mr-3 pr-3 text-right" style="border-right: 1px solid #555;">
                                        <div class="text-xs mb-1">Pot. Shopee</div>
                                        <h5 class="m-0 font-weight-bold">{{ number_format($subpotongan, 0, ',', '.') }}</h5>
                                    </div>
                                    <div class="mr-3 pr-3  text-right" style="border-right: 1px solid #555;">
                                        <div class="text-xs mb-1">Kulakan + Gaji</div>
                                        <h5 class="m-0 font-weight-bold">{{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                                    </div>
                                    <div class="px-3 box-angka bg-grin text-white shadow-dark ">
                                        <div class="text-right">
                                            <p class="m-0 mb-1">Untung Bersih</p>
                                            <h5 class="m-0 font-weight-bold">{{ number_format($labaBersih, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                    
                                </div> 
                            </div> {{-- end row --}}
                            <div class="col-md-3 px-4 h-100" style="border-right: 1px solid #555;">
                                @php
                                    $namaBulan = \Carbon\Carbon::createFromFormat('m', $bulan)->locale('id')->translatedFormat('F');
                                    $daftarProduk = $produkTeratasPerBulan[$bulan] ?? collect();
                                @endphp
                                <div class="row no-gutters w-100">
                                    <div class="col-12 mt-0 mb-2">
                                        <h5 class="m-0 font-weight-bold">Produk Terlaris</h5>
                                    </div>
                                    <div class="col-3 rata-kiri" style="height: 100px">
                                        <div class="card-icon bg-danger">
                                            <i class="fas fa-cubes fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 rata-kiri" style="height: 100px">
                                        <div class="w-100">
                                        @if ($daftarProduk->isEmpty())
                                            <p><em>Tidak ada data produk untuk bulan ini.</em></p>
                                        @else
                                            @foreach ($daftarProduk as $produk)
                                                <div class="rata align-items-center job job-list-light mb-1 pb-1">
                                                    <p class="text-xs m-0">{{ $loop->iteration }}. {{ $produk->nama }}</p>
                                                    <div class="text-right">
                                                        <h5 class="mb-0 font-weight-bold mr-3">{{ $produk->total_order }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-4">
                                <div class="row no-gutters w-100">
                                    <div class="col-12 mt-0 mb-2">
                                        <h5 class="m-0 font-weight-bold">Jumlah Pesanan</h5>
                                    </div>
                                    <div class="col-3 rata-kiri" style="height: 100px">
                                        <div class="card-icon bg-orange">
                                            <i class="fas fa-truck fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 rata-kiri" style="height: 100px">
                                        <div class="w-100">
                                            <div class="rata job job-list-light mb-1 pb-2">
                                                <div class="text-xs m-0">
                                                    Produk Dibuat
                                                </div>
                                                <h3 class="mb-0 font-weight-bold mr-3">{{ $listOrder->count() }}</h3>
                                            </div>
                                            <div class="rata job job-list-light">
                                                <div class="text-xs m-0">
                                                    Order Masuk
                                                </div>
                                                <h4 class="mb-0 font-weight-bold mr-3">{{ $jumlahOrderPerBulan[$bulan] ?? 0 }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- end row --}}
            </div> {{-- end col-lg-12 --}}
        @endforeach
    </div>
</div>
@endsection