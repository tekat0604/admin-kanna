<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        $status = $this->normalizeStatus($data['status_pesanan'] ?? '');

        // Hapus jika status adalah "batal"
        if (strtolower($status) === 'batal') {
            $order = Order::where('no_pesan', $data['no_pesanan'] ?? null)
                ->where('produk', $data['nama_produk'] ?? null)
                ->where('variasi', $data['nama_variasi'] ?? null)
                ->first();

            if ($order) {
                $order->delete();
            }
            return;
        }

        // Lewati jika status adalah "belum dibayar"
        if (in_array(strtolower($status), ['belum bayar'])) {
            return;
        }

        // Update berdasarkan no_pesan
        $order = Order::where('no_pesan', $data['no_pesanan'] ?? null)
                ->where('produk', $data['nama_produk'] ?? null)
                ->where('variasi', $data['nama_variasi'] ?? null)
                ->first();

        if ($order) {
            // Update data yang ada
            $order->update([
                'nama'         => $data['username_pembeli'] ?? null,
                'tgl_pesan'    => $data['waktu_pesanan_dibuat'] ?? null,
                'tgl_deadline' => empty($data['pesanan_harus_dikirimkan_sebelum_menghindari_keterlambatan']) 
                                    ? null 
                                    : date('Y-m-d H:i:s', strtotime($data['pesanan_harus_dikirimkan_sebelum_menghindari_keterlambatan'])),
                'produk'       => $data['nama_produk'] ?? null,
                'variasi'      => $data['nama_variasi'] ?? null,
                'jumlah'       => $data['jumlah'] ?? null,
                'harga'        => isset($data['harga_setelah_diskon']) ? (int) str_replace('.', '', $data['harga_setelah_diskon']) : null,
                'status'       => $status,
            ]);
        } else {
            // Insert baru jika tidak ditemukan
            Order::create([
                'no_pesan'     => $data['no_pesanan'] ?? null,
                'nama'         => $data['username_pembeli'] ?? null,
                'tgl_pesan'    => $data['waktu_pesanan_dibuat'] ?? null,
                'tgl_deadline' => empty($data['pesanan_harus_dikirimkan_sebelum_menghindari_keterlambatan']) 
                                    ? null 
                                    : date('Y-m-d H:i:s', strtotime($data['pesanan_harus_dikirimkan_sebelum_menghindari_keterlambatan'])),
                'produk'       => $data['nama_produk'] ?? null,
                'variasi'      => $data['nama_variasi'] ?? null,
                'jumlah'       => $data['jumlah'] ?? null,
                'harga'        => isset($data['harga_setelah_diskon']) ? (int) str_replace('.', '', $data['harga_setelah_diskon']) : null,
                'status'       => $status,
            ]);
        }
    }

    private function normalizeStatus($status)
    {
        if ($status && str_starts_with($status, 'Pesanan diterima, namun Pembeli masih dapat mengajukan pengembalian hingga')) {
            return 'Selesai';
        } elseif (in_array(strtolower($status), ['telah dikirim', 'sedang dikirim'])) {
            return 'Dikirim';
        }

        return $status;
    }
}