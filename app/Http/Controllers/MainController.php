<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class MainController extends Controller
{
    public function index()
    {
        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        $order_baru    = order::where('status','Perlu Dikirim')->orderBy('tgl_deadline')->get();
        $groupedOrders = $order_baru->groupBy('no_pesan');
        $j_order       = order::where('status','Perlu Dikirim')->count();
        $orders        = order::whereMonth('tgl_pesan', $bulan_ini)
                         ->whereYear('tgl_pesan', $tahun_ini)
                         ->get();

        $grandTotal = 0;
        $grandBersih = 0;   

        foreach ($orders as $or) {
            $total    = $or->harga * $or->jumlah;
            $potongan = intval((7.5 * $total / 100) + (2.25 * $total / 100) + (1.4 * $total / 100) + (4 * $total / 100));
            $bersih   = $total - $potongan;
    
            $grandTotal += $total;
            $grandBersih += $bersih;
        }

        return view('dashboard', [
            'order'           => $orders,
            'groupedOrders'   => $groupedOrders,
            'order_baru'      => $order_baru,
            'j_order'         => $j_order,
            'title'           => 'Dashboard',
            'grandTotal'      => $grandTotal,
            'grandBersih'     => $grandBersih,
            // 'grandKeluar'     => $grandKeluar,
            
        ]);
    }
}
