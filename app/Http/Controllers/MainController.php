<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\produk;
use App\Models\pengeluaran;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrderImport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB; 

class MainController extends Controller
{
    public function index()
    {
        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        $order_baru    = order::where('status','Perlu Dikirim')->orderBy('tgl_pesan')->get();
        $groupedOrders = $order_baru->groupBy('no_pesan');
        $produkList    = produk::pluck('nama', 'produk');
        $j_order       = order::where('status','Perlu Dikirim')->get()->unique('no_pesan')->count();
        $j_produk      = order::where('status','Perlu Dikirim')->get()->count();
        $orders        = order::whereMonth('tgl_pesan', $bulan_ini)
                         ->whereYear('tgl_pesan', $tahun_ini)
                         ->get();
        $selesais      = order::whereMonth('tgl_pesan', $bulan_ini)
                        ->whereYear('tgl_pesan', $tahun_ini)
                        ->where('status', 'Selesai')->get();
        $pengeluaran    = Pengeluaran::where('status','sudah ambil')->whereMonth('tgl_keluar', $bulan_ini)
                        ->whereYear('tgl_keluar', $tahun_ini)
                        ->get();
        $j_produkkirim  = produk::withCount('PerluKirim')->get();
        $j_buat2025     = Produk::withSum(['AmbilOrder as total_buat2025' => function ($query) use ($tahun_ini) {
                          $query->whereYear('tgl_pesan', $tahun_ini);
                          }],'jumlah')->get(); 
        $j_buat         = Produk::withSum('AmbilOrder as total_buat', 'jumlah')->get();
        $j_order2025    = order::whereYear('tgl_pesan', $tahun_ini)->get()->unique('no_pesan')->count();
        $j_ordertotal   = order::get()->unique('no_pesan')->count();

        $grandTotal = 0;
        $grandPotongan = 0;
        $grandBersih = 0;
        $grandMasuk = 0;
        $grandKeluar = 0;
    
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

        return view('dashboard', [
            'order'           => $orders,
            'groupedOrders'   => $groupedOrders,
            'order_baru'      => $order_baru,
            'produkList'      => $produkList,
            'j_order'         => $j_order,
            'j_order2025'     => $j_order2025,
            'j_ordertotal'    => $j_ordertotal,
            'j_produk'        => $j_produk,
            'j_produkkirim'   => $j_produkkirim,
            'j_buat2025'      => $j_buat2025,
            'j_buat'          => $j_buat,
            'title'           => 'Dashboard',
            'grandTotal'      => $grandTotal,
            'grandPotongan'   => $grandPotongan,
            'grandBersih'     => $grandBersih,
            'grandMasuk'      => $grandMasuk,
            'grandKeluar'     => $grandKeluar,
            
        ]);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new OrderImport, $request->file('file'));

        return redirect()->route('home')
                          ->with('success','File berhasil diimport');
    }
    
    public function laba(Request $request)
    {
        $query = Order::query();
    
        // Gunakan bulan dan tahun sekarang jika tidak diisi
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');
        $query->whereYear('tgl_pesan', $tahun);
    
        // Simpan query untuk reuse
        $filteredQuery = clone $query;
    
        $order                  = (clone $filteredQuery)->orderBy('tgl_pesan')->get();
        $ordersPerBulan         = $order->groupBy(function ($order) {
                                    return Carbon::parse($order->tgl_pesan)->format('m');
                                    });
        $pengeluaran            = Pengeluaran::where('status', 'sudah ambil')
                                ->whereYear('tgl_keluar', $tahun)
                                ->get();
        $pengeluaranPerBulan    = $pengeluaran->groupBy(function ($item) {
                                return \Carbon\Carbon::parse($item->tgl_keluar)->format('m');
                                });                     
        $produkPerBulan         = DB::table('order')
                                ->join('produk', 'order.produk', '=', 'produk.produk')
                                ->select(
                                    DB::raw('MONTH(order.tgl_pesan) as bulan'),
                                    'produk.nama',
                                    DB::raw('COUNT(*) as total_order')
                                )
                                ->whereYear('order.tgl_pesan', $tahun)
                                ->groupBy('bulan', 'produk.nama')
                                ->orderBy('bulan')
                                ->orderByDesc('total_order')
                                ->get()
                                ->groupBy(function($item) {
                                    return str_pad($item->bulan, 2, '0', STR_PAD_LEFT); // key jadi '01', '02', dst
                                });

        $produkTeratasPerBulan = [];
        foreach ($produkPerBulan as $bulan => $list) {
            $produkTeratasPerBulan[$bulan] = $list->take(3);
        } 

        return view('laba.laba', [
            'order'                 => $order,
            'ordersPerBulan'        => $ordersPerBulan,
            'pengeluaran'           => $pengeluaran,
            'pengeluaranPerBulan'   => $pengeluaranPerBulan,
            'ordersPerBulan'        => $ordersPerBulan,
            'produkTeratasPerBulan' => $produkTeratasPerBulan,
            'tahun'                 => $tahun,
            'title'                 => 'Dafta Keuntungan Pertahun',
            
        ]);
    }
}
