<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    // protected $guarded = ['noPolisi'];
    protected $primaryKey = 'noPolisi';
    public $incrementing = false; // Tambahkan ini jika noPolisi bukanlah sebuah kolom yang auto-increment
    public $timestamps = false;


    protected $fillable = [
        'noPolisi',
        'merekMobil',
        'modelMobil',
        'kapasitasMobil',
        'tahunMobil',
        'deskripsiMobil',
        'hargaSewa',
        'statusMobil',
        // 'gambarMobil',

    ];

    public function pemesanan()
    {
        return $this->hasMany(DataPemesanan::class, 'mobil_noPolisi');
    }
}
