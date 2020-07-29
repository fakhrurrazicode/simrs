<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $fillable = [
        'no_rekam_medis',
        'nama',
        'jenis_kelamin'
    ];
}
