<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    // protected $guarded = ['noPolisi'];
    protected $primaryKey = 'idPembayaran';
    public $incrementing = false; // Tambahkan ini jika noPolisi bukanlah sebuah kolom yang auto-increment
    public $timestamps = false;


    protected $fillable = [
        'pemesanan_idPemesanan',
        'user_idUser',
        'penyewa_idPenyewa',
        'tanggalPembayaran',
        'totalPembayaran',
        'statusPembayaran',
        // 'gambarMobil',

    ];

    public function penyewa()
    {
        return $this->belongsTo(DataPenyewa::class, 'idPenyewa');
    }
}
