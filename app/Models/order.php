<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $table ='order';
    protected $guarded = ['id'];
    protected $fillable = [ 'no_pesan',
                            'nama',
                            'tgl_pesan',
                            'tgl_deadline',
                            'produk',
                            'variasi',
                            'jumlah',
                            'harga',
                            'status'];
}
