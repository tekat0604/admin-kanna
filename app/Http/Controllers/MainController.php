<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\produk;
use App\Models\pengeluaran;

class MainController extends Controller
{
    public function index()
    {
        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        $order_baru    = order::where('status','Perlu Dikirim')->orderBy('tgl_pesan')->get();
        $groupedOrders = $order_baru->groupBy('no_pesan');
        $j_order       = order::where('status','Perlu Dikirim')->get()->unique('no_pesan')->count();
        $j_produk      = order::where('status','Perlu Dikirim')->get()->count();
        $produk        = produk::orderBy('id')->get();
        $orders        = order::whereMonth('tgl_pesan', $bulan_ini)
                         ->whereYear('tgl_pesan', $tahun_ini)
                         ->get();
        $orders        = order::whereMonth('tgl_pesan', $bulan_ini)
                        ->whereYear('tgl_pesan', $tahun_ini)
                        ->get();;
        $selesais      = order::whereMonth('tgl_pesan', $bulan_ini)
                        ->whereYear('tgl_pesan', $tahun_ini)
                        ->where('status', 'Selesai')->get();
        $pengeluaran    = Pengeluaran::where('status','sudah ambil')->whereMonth('tgl_keluar', $bulan_ini)
                        ->whereYear('tgl_keluar', $tahun_ini)
                        ->get();
        $j_bengkel     = order::where('produk','diorama hotwheels / miniscale diecast skala 1:64 tema bengkel')->where('status','perlu dikirim')->count();
        $j_bengkel2    = order::where('produk','diorama hotwheels / miniscale diecast skala 1:64 tema bengkel cocok untuk pajangan dan fotografi')->where('status','perlu dikirim')->count();
        $j_lawson      = order::where('produk','diorama diecast hotwheels / miniscale 1:64 tema toko lawson')->where('status','perlu dikirim')->count();
        $j_ramen       = order::where('produk','diorama hotwheels / miniscale 1:64 tema warung ramen')->where('status','perlu dikirim')->count();
        $j_eleven      = order::where('produk','diorama hotwheels / miniscale 1:64 tema toko 7 eleven')->where('status','perlu dikirim')->count();
        $j_parkir      = order::where('produk','sticker Diorama Jalan skala 1/64 cocok untuk hotwheels/miniscale')->where('status','perlu dikirim')->count();
        $j_jalan       = order::where('produk','Sticker diorama parkiran cocok untuk hotwheels atau miniscale 1:64')->where('status','perlu dikirim')->count();

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
            'j_order'         => $j_order,
            'j_produk'        => $j_produk,
            'j_bengkel'       => $j_bengkel,
            'j_bengkel2'      => $j_bengkel2,
            'j_ramen'         => $j_ramen,
            'j_lawson'        => $j_lawson,
            'j_eleven'        => $j_eleven,
            'j_parkir'        => $j_parkir,
            'j_jalan'         => $j_jalan,
            'produk'          => $produk,
            'title'           => 'Dashboard',
            'grandTotal'      => $grandTotal,
            'grandPotongan'   => $grandPotongan,
            'grandBersih'     => $grandBersih,
            'grandMasuk'      => $grandMasuk,
            'grandKeluar'     => $grandKeluar,
            
        ]);
    }
}
