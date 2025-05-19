<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengeluaran;
use App\Models\order;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = pengeluaran::query();
    
        // Gunakan bulan dan tahun sekarang jika tidak diisi
        $bulan = $request->filled('bulan') ? $request->bulan : date('m');
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');
    
        $query->whereMonth('tgl_keluar', $bulan);
        $query->whereYear('tgl_keluar', $tahun);
    
        // Simpan query untuk reuse
        $filteredQuery = clone $query;

        $pengeluaran  = (clone $filteredQuery)->orderBy('tgl_keluar','DESC')->get();
        $belum_ambil  = (clone $filteredQuery)->where('status', 'belum ambil')->get();
        $ambil        = (clone $filteredQuery)->where('status', 'sudah ambil')->get();
        
        $grandTotal = 0;
        $grandAmbil = 0;
        $grandBelum = 0;
    
        foreach ($pengeluaran as $pe) {
            $total       = $pe->jumlah;
            $grandTotal += $total;
        }

        foreach ($belum_ambil as $be) {
            $total_belum = $be->jumlah;
            $grandBelum += $total_belum;
        }
        foreach ($ambil as $am) {
            $total_ambil = $am->jumlah;
            $grandAmbil += $total_ambil;
        }

        return view('pengeluaran.pengeluaran', [
            'pengeluaran' => $pengeluaran,
            'grandTotal' => $grandTotal,
            'grandAmbil' => $grandAmbil,
            'grandBelum' => $grandBelum,
            'title' => 'Daftar Pengeluaran',
            
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
        $request->validate([
            'pengeluaran' => 'required',
            'tgl_keluar'  => 'required',
            'jumlah'      => 'required',
            'status'      => 'required',
            'tgl_ambil'   => 'nullable',
        ]);
        $input = $request->all();
        pengeluaran::create($input);
        
        return redirect()->route('pengeluaran.index')
                          ->with('success','Pengeluaran berhasil ditambahkan');
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
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'pengeluaran' => 'required',
            'tgl_keluar'  => 'required',
            'jumlah'      => 'required',
            'status'      => 'required',
            'tgl_ambil'   => 'nullable',
        ]);
        
        $input = $request->all();
        $pengeluaran->update($input);
        return redirect()->route('pengeluaran.index')
                          ->with('success','Keterangan Pengeluaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
       
        return redirect()->route('pengeluaran.index')
                        ->with('success','Pengeluaran berhasil dihapus');
    }
}
