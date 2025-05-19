<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\pengeluaran;
use App\Models\produk;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrderImport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();
    
        // Gunakan bulan dan tahun sekarang jika tidak diisi
        $bulan = $request->filled('bulan') ? $request->bulan : date('m');
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');
    
        $query->whereMonth('tgl_pesan', $bulan);
        $query->whereYear('tgl_pesan', $tahun);
    
        // Simpan query untuk reuse
        $filteredQuery = clone $query;
    
        $orders          = (clone $filteredQuery)->orderBy('tgl_pesan','DESC')->get();
        $groupedOrders   = $orders->groupBy('no_pesan');
        $produkList     = produk::pluck('nama', 'produk');
        $selesais        = (clone $filteredQuery)->where('status', 'selesai')->get();
        $jml_perlukirims = (clone $filteredQuery)->where('status', 'perlu dikirim')->get()->unique('no_pesan')->count();
        $jml_dikirims    = (clone $filteredQuery)->where('status', 'dikirim')->get()->unique('no_pesan')->count();
        $jml_selesais    = (clone $filteredQuery)->where('status', 'selesai')->get()->unique('no_pesan')->count();
        $pengeluaran     = Pengeluaran::where('status','sudah ambil')->whereMonth('tgl_keluar', $bulan)
                           ->whereYear('tgl_keluar', $tahun)
                           ->get();
        $jml_totals      = (clone $filteredQuery)->get()->unique('no_pesan')->count();
    
        $grandTotal     = 0;
        $grandPotongan  = 0;
        $grandBersih    = 0;
        $grandMasuk     = 0;
        $grandKeluar    = 0;
    
        foreach ($orders as $or) {
            $total    = $or->harga * $or->jumlah;
            $potongan = intval((7.5 * $total / 100) + (2.25 * $total / 100) + (1.4 * $total / 100) + (4 * $total / 100));
            $bersih   = $total - $potongan;
    
            $grandTotal += $total;
            $grandPotongan += $potongan;
            $grandBersih += $bersih;
        }
        foreach ($selesais as $ss) {
            $total_masuk = $ss->harga * $ss->jumlah;
            $potongan_masuk = intval((7.5 * $total_masuk / 100) + (2.25 * $total_masuk / 100) + (1.4 * $total_masuk / 100) + (4 * $total_masuk / 100));
            $masuk = $total_masuk - $potongan_masuk;
            $grandMasuk += $masuk;
        }
        foreach ($pengeluaran as $pe) {
            $total_keluar   = $pe->jumlah;
            $grandKeluar   += $total_keluar;
        }

        return view('order.order', [
            'order'           => $orders,
            'groupedOrders'   => $groupedOrders,
            'produkList'      => $produkList,
            'jml_perlukirim'  => $jml_perlukirims,
            'jml_dikirim'     => $jml_dikirims,
            'jml_selesai'     => $jml_selesais,
            'jml_total'       => $jml_totals,
            'title'           => 'Daftar Pesanan',
            'grandTotal'      => $grandTotal,
            'grandPotongan'   => $grandPotongan,
            'grandBersih'     => $grandBersih,
            'grandMasuk'      => $grandMasuk,
            'grandKeluar'     => $grandKeluar,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new OrderImport, $request->file('file'));

        return redirect()->route('order.index')
                          ->with('success','File berhasil diimport');
    }
}
