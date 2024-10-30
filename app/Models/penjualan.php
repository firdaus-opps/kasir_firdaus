<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }

    public function Penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'nobon', 'id');
    }

}
