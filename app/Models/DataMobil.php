<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $guarded = ['idMobil'];
    protected $primaryKey = 'idMobil';
    // protected $fillable = ['username', 'password', 'hakAkses', 'idPegawai'];
    // protected $hidden = ['password', 'remember_token'];
    public $timestamps = false;
}
