<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah', 'barang_id', 'user_id', 'pembeli_id'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }
     public function pembeli(){
        return $this->belongsTo(Pembeli::class);
    }
}
