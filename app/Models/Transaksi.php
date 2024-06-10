<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_transaksi', 'jumlah', 'barang_id','status', 'user_id'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
    
}
