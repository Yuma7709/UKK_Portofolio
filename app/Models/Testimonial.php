<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'kategori',
        'nama',
        'jabatan',
        'isi',
        'rating',
        'foto',
    ];
}