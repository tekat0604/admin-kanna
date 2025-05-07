@extends('part.layout')
@section('content')
@include('part.header')

<div class="container-fluid">
<!-- Content Row -->
    <div class="row"> 
        <div class="col-lg-4 mb-4">
            <div class="card bg-gray-100 py-2">
                <div class="card-body ">
                    <div class="rowno-gutters align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 rata">
                            <div class="rata-kiri">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-plus fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-xs m-0">Tambah Data</p>
                                    <h5 class="m-0 font-weight-bold">Pengeluaran</h5>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-info shadow">
                                Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-lg-8 col-12 mb-4">
            <div class="card bg-gray-100 py-2">
                <div class="card-body ">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-4 rata-kiri">
                            <div class="card-icon bg-orange mr-3">
                                <i class="fas fa-dollar fa-2x"></i>
                            </div>
                            <div class="">
                                @php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('id');
                                    $bulanAktif = request('bulan', date('m'));
                                    $namaBulan = Carbon::createFromFormat('m', $bulanAktif)->translatedFormat('F');
                                @endphp
                                <p class="text-xs m-0">Pengeluaran Bulan</p>
                                <h5 class="m-0 font-weight-bold">{{ $namaBulan }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-8 rata-kanan text-right">
                            <div class="px-3" style="border-right: 1px solid #555;">
                                <div class="text-xs mb-1">
                                    Belum Ambil
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    Rp. {{ number_format($grandBelum, 0, ',', '.') }}
                                </h5>
                            </div>
                            <div class="px-3" style="border-right: 1px solid #555;">
                                <div class="text-xs mb-1">
                                    Sudah Ambil
                                </div>
                                <h5 class="m-0 font-weight-bold">
                                    Rp. {{ number_format($grandAmbil, 0, ',', '.') }}
                                </h5>
                            </div>
                            <div class="ml-3 px-3 box-angka bg-orange text-white shadow-dark rata-kanan">
                                <div>
                                    <p class="m-0">Total </p>
                                    <h5 class="m-0 ml-3 font-weight-bold">
                                        Rp. {{ number_format($grandTotal, 0, ',', '.') }}
                                    </h5>
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
                        <div class="col-md-5 mb-4">
                            <form action="{{ route('pengeluaran.index') }}" method="GET">
                                @csrf
                                <div class="rata-kanan w-100 d-flex">
                                    <label class="m-0 mr-2">Filter tanggal</label>
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
                                    <th>Pengeluaran</th>
                                    <th>Tgl Keluar</th>
                                    <th>Jumlah</th>
                                    <th><center>Status</center></th>
                                    <th>Tgl Ambil</th>
                                    <th><center><i class="fas fa-cog"></i></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $pe)
                                <tr>
                                    <td><center>{{ $loop->iteration }}.</center></td>
                                    <td>{{ $pe->pengeluaran }}</td>
                                    <td>{{ date("d-m-y", strtotime($pe->tgl_keluar)) }}</td>
                                    <td style="text-align:right">{{ number_format($pe->jumlah, 0, ',', '.') }}</td>
                                    <td>
                                        <center>
                                        @if($pe->status == 'sudah ambil')
                                            <badge class="badge badge-success" style="padding: 7px">{{ $pe->status }}</badge>
                                        @elseif($pe->status == 'belum ambil')
                                            <badge class="badge badge-orange" style="padding: 7px">{{ $pe->status }}</badge>
                                        @endif
                                        </center>
                                    </td>
                                    <td>
                                        @if ($pe->tgl_ambil !== null)
                                            {{ date("d-m-y", strtotime($pe->tgl_ambil)) }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="rata-tengah">
                                            <a href="#" data-toggle="modal" data-target="#edit-item{{ $loop->iteration }}">
                                                <div class="icon-circle bg-info mr-2">
                                                    <i class="fas fa-pencil text-white"></i>
                                                </div>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#hapus-item{{ $loop->iteration }}">
                                                <div class="icon-circle bg-danger">
                                                    <i class="fas fa-trash text-white"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
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
<!-- modal tambah -->
<div class="modal fade" id="tambah" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content pd-3">
            <div class="modal-header m-0">
                <h6 class="font-weight-bold">Tambah Pengeluaran</h6>
                <button type="button" class="close text-orange" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pengeluaran.store') }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Pengeluaran</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="pengeluaran" type="text" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Tangal Keluar</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="tgl_keluar" type="date" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Jumlah</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="jumlah" type="text" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <select name="status" class="form-control">
                                    <option value="belum ambil">Belum Ambil</option>
                                    <option value="sudah ambil">Sudah Ambil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Tanggal Ambil</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="tgl_ambil" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-kanna">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end tambah-->
<!-- modal edit-->
@foreach ($pengeluaran as $pe2)
<div class="modal fade" id="edit-item{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content pd-3">
            <div class="modal-header m-0">
                <h6 class="font-weight-bold">Tambah Pengeluaran</h6>
                <button type="button" class="close text-orange" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pengeluaran.update', $pe2->id) }}" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <label>Pengeluaran</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="pengeluaran" type="text" class="form-control" required="true" value="{{ $pe2->pengeluaran }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Tangal Keluar</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="tgl_keluar" type="date" class="form-control" required="true" value="{{ $pe2->tgl_keluar }}">>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Jumlah</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="jumlah" type="text" class="form-control" required="true" value="{{ $pe2->jumlah }}">>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <select name="status" class="form-control">
                                    @if ($pe2->status == 'belum ambil')
                                        <option value="belum ambil" selected>Belum Ambil</option>
                                        <option value="sudah ambil">Sudah Ambil</option>
                                    @else
                                        <option value="belum ambil">Belum Ambil</option>
                                        <option value="sudah ambil" selected>Sudah Ambil</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Tanggal Ambil</label>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <input name="tgl_ambil" type="date" class="form-control" value="{{ $pe2->tgl_ambil }}">>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-kanna">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- end edit-->
<!-- modal hapus-->
@foreach ($pengeluaran as $pe3)
<div class="modal fade" id="hapus-item{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Dihapus?</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body mb-3 text-center">
                <p class="m-0">anda akan menghapus Pengeluaran</p>
                <p class="text-danger">{{ $pe3->pengeluaran}}</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <form action="{{ route('pengeluaran.destroy', $pe3->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- end hapus-->
@endsection