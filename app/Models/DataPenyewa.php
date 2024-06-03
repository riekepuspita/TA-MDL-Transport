<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewa';
    protected $guarded = ['idPenyewa'];
    protected $primaryKey = 'idPenyewa';

    protected $fillable = [
        'noNIK',
        'user_idUser',
        'namaLengkap',
        'jeniskelamin',
        'alamat',
        'noHP',
        'uploadKTP',
        'created_at',
        'user_idUser',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'bycrypt',
    ];

    public function pemesanan()
    {
        return $this->hasMany(DataPemesanan::class, 'penyewa_idPenyewa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_idUser');
    }

    // Pemesanan model
    public function mobil()
    {
        return $this->belongsTo(DataMobil::class, 'mobil_id', 'idmobil');
    }
}
