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
                            <div class="col-md-5 pr-3" style="border-right: 1px solid #555;">
                                <div class="row align-items-center w-100">
                                    <div class="col-lg-12 p-0 text-right">
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
                                            <div class="mr-3 pr-3" style="border-right: 1px solid #555;">
                                                <div class="text-xs mb-1">Pot. Shopee</div>
                                                <h5 class="m-0 font-weight-bold">{{ number_format($subpotongan, 0, ',', '.') }}</h5>
                                            </div>
                                            <div class="mr-3 pr-3" style="border-right: 1px solid #555;">
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
                                    </div>
                                </div>
                            </div> {{-- end row --}}
                            <div class="col-md-4 px-4" style="border-right: 1px solid #555;">
                                @php
                                    $namaBulan = \Carbon\Carbon::createFromFormat('m', $bulan)->locale('id')->translatedFormat('F');
                                    $daftarProduk = $produkTeratasPerBulan[$bulan] ?? collect();
                                @endphp
                                <h5 class="font-weight-bold">Produk Terlaku</h5>
                                @if ($daftarProduk->isEmpty())
                                    <p><em>Tidak ada data produk untuk bulan ini.</em></p>
                                @else
                                    @foreach ($daftarProduk as $produk)
                                        <div class="rata align-items-center job job-list-light mb-1 pb-1">
                                            <p class="text-xs m-0">{{ $loop->iteration }}. {{ $produk->nama }}</p>
                                            <div class="">
                                                <h5 class="mb-0 font-weight-bold mr-3">{{ $produk->total_order }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-md-3 pl-4">
                                <div class="rata-tengah">
                                    <div class="w-100">
                                        <div class="rata job job-list-light mb-1 pb-2">
                                            <div class="rata-kiri">
                                                <div class="card-icon bg-orange mr-3">
                                                    <i class="fas fa-cubes fa-2x"></i>
                                                </div>
                                                <div class="text-xs m-0">
                                                    Produk<br> Dibuat
                                                </div>
                                            </div>
                                            <h3 class="mb-0 font-weight-bold mr-3">355</h3>
                                        </div>
                                        <div class="rata job job-list-light">
                                            <div class="rata-kiri">
                                                <div class="card-icon bg-danger mr-3">
                                                    <i class="fas fa-list fa-2x"></i>
                                                </div>
                                                <div class="text-xs m-0">
                                                    Order<br>Masuk
                                                </div>
                                            </div>
                                            <h4 class="mb-0 font-weight-bold mr-3">252</h4>
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