<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    public $table ='pengeluaran';
    protected $guarded = ['id'];
    protected $fillable = [ 'pengeluaran',
                            'jumlah',
                            'tgl_keluar',
                            'tgl_ambil',
                            'status'];
}
