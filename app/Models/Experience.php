<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'kategori', 'judul', 'instansi', 'periode',
        'jabatan', 'deskripsi', 'gambar',
    ];
}