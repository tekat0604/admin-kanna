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
                        <h5 class="m-0"> Data Keuntungan Tahun <b>{{ request('tahun', date('Y')) }}</b></h5>
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

            <div class="col-lg-12 col-12 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-gray-100" style="height: 160px">
                            <div class="card-body rata-tengah">
                                <div class="row no-gutters align-items-center w-100">
                                    <div class="col-lg-2 no-gutters">
                                        <div class="mt-2">
                                            <h4 class="m-0 font-weight-bold">
                                                <span class="text-success">{{ ucfirst($namaBulan) }}</span><br>{{ $tahunDipilih }}
                                            </h4>
                                        </div>    
                                    </div>         
                                    <div class="col-lg-7 no-gutters text-right">
                                        <div class="px-4 mb-3">
                                            <div class="pb-3 rata-kanan" style="border-bottom: 1px solid #555;">
                                                <div class="text-xs m-0 mr-2">Untung Kotor</div>
                                                <h5 class="m-0 font-weight-bold">Rp. {{ number_format($subtotal, 0, ',', '.') }}</h5>
                                            </div>
                                        </div>
                                        <div class="px-4 mb-3 rata-kanan"> 
                                            <div class="mr-3 pr-3" style="border-right: 1px solid #555;">
                                                <div class="text-xs mb-1">Pot. Shopee</div>
                                                <h5 class="m-0 font-weight-bold">Rp. {{ number_format($subpotongan, 0, ',', '.') }}</h5>
                                            </div>
                                            <div>
                                                <div class="text-xs mb-1">Kulakan + Gaji</div>
                                                <h5 class="m-0 font-weight-bold">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3 text-right">
                                        <div class="rata-kanan">
                                            <div class="px-3 box-angka bg-grin text-white shadow-dark">
                                                <div class="text-right">
                                                    <p class="m-0">Untung Bersih</p>
                                                    <h5 class="m-0 font-weight-bold">Rp. {{ number_format($labaBersih, 0, ',', '.') }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{-- end row --}}
                            </div> {{-- end card-body --}}
                        </div> {{-- end card --}}
                    </div> {{-- end col-md-5 --}}
                    <div class="col-md-3">
                        @php
                            $namaBulan = \Carbon\Carbon::createFromFormat('m', $bulan)->locale('id')->translatedFormat('F');
                            $daftarProduk = $produkTeratasPerBulan[$bulan] ?? collect();
                        @endphp
                        <div class="card bg-gray-100 py-2" style="height: 160px">
                            <div class="card-body w-100 py-2">
                                <h5 class="font-weight-bold mb-1">Produk Terlaku</h5>
                                @if ($daftarProduk->isEmpty())
                                    <p><em>Tidak ada data produk untuk bulan ini.</em></p>
                                @else
                                    @foreach ($daftarProduk as $produk)
                                        <div class="rata no-gutters align-items-center job job-list-light mb-2 pb-2">
                                            <p class="text-xs m-0">{{ $loop->iteration }}. {{ $produk->nama }}</p>
                                            <div class="">
                                                <h5 class="mb-0 font-weight-bold mr-3">{{ $produk->total_order }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-gray-100 py-2"  style="height: 160px">
                            <div class="card-body rata-tengah">
                                <div class="w-100">
                                    <div class="rata job job-list-light mb-1 pb-2">
                                        <div class="rata-kiri pr-3">
                                            <div class="card-icon bg-orange mr-2">
                                                <i class="fas fa-cubes fa-2x"></i>
                                            </div>
                                            <div class="text-xs m-0">
                                                Produk<br> Dibuat
                                            </div>
                                        </div>
                                        <h3 class="mb-0 font-weight-bold mr-3">355</h3>
                                    </div>
                                    <div class="rata job job-list-light">
                                        <div class="rata-kiri pr-3">
                                            <div class="card-icon bg-danger mr-2">
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
                </div> {{-- end row --}}
            </div> {{-- end col-lg-12 --}}
        @endforeach
    </div>
</div>
@endsection