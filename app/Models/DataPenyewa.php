<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyewa extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = ['idPenyewa'];
    protected $primaryKey = 'idPenyewa';
    // protected $fillable = ['username', 'password', 'hakAkses', 'idPegawai'];
    // protected $hidden = ['password', 'remember_token'];
    public $timestamps = false;

    protected $fillable = [
        'noNIK',
        'namaLengkap',
        'jeniskelamin',
        'alamat',
        'noHP',
        'email',
        // 'password',
        'role',

    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'bycrypt',
    ];
}
