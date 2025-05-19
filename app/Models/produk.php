<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;

class produk extends Model
{
    use HasFactory;
    public $table ='produk';
    protected $guarded = ['id'];
    protected $fillable = ['produk,nama'];

    public function PerluKirim()
    {
        return $this->hasMany(order::class, 'produk', 'produk')
                    ->where('status', 'perlu dikirim');
    }

    public function AmbilOrder()
    {
        return $this->hasMany(order::class, 'produk', 'produk');
    }
}

