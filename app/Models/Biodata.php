<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $fillable = [
        'nama_lengkap', 'alamat',
    ];
}