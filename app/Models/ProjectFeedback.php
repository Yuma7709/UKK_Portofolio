<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFeedback extends Model
{
    protected $table = 'project_feedbacks';

    protected $fillable = ['project_id', 'nama', 'rating', 'komentar'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}