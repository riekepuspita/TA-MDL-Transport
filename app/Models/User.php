<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $guarded = ['idUser']; 
    protected $primaryKey = 'idUser';
    public $timestamps = false;

    protected $fillable = [
        'namaUser',
        'email',
        'password',
        'level',
        'statusUser',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function datapenyewa()
    {
        return $this->hasOne(DataPenyewa::class, 'user_idUser');
    }

    public function pemesanan()
{
    return $this->hasMany(DataPemesanan::class, 'penyewa_idPenyewa');
}
}
