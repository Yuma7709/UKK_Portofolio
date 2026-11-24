<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    'judul','gambar','deskripsi','teknologi',
    'masalah','tujuan','peran','link_demo','link_github',
    'dokumentasi','galeri','detail','fitur',
];

    public function feedbacks()
    {
        return $this->hasMany(ProjectFeedback::class);
    }
}