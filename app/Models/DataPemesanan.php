<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $guarded = ['idPemesanan'];
    protected $primaryKey = 'idPemesanan';
    // public $timestamps = false;

    protected $fillable = [
        'penyewa_idPenyewa', // tambahkan kolom penyewa_idPenyewa ke fillable
        'mobil_noPolisi',
        'tanggalMulai',
        'tanggalSelesai',
        'tujuan',
        'keberangkatan',
        
        // tambahkan bidang lain yang diperlukan
    ];

    // Definisikan relasi belongsTo dengan model DataPenyewa
    public function penyewa()
    {
        return $this->belongsTo(DataPenyewa::class, 'penyewa_idPenyewa');
    }

    public function mobil()
    {
        return $this->belongsTo(DataMobil::class, 'mobil_noPolisi', 'noPolisi'); // Sesuaikan dengan nama kolom kunci asing jika berbeda
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_idUser');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_idPemesanan');
    }
    
}
