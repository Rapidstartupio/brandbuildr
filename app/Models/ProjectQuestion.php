<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectQuestion extends Model
{
    use HasFactory;
    public function examples(): BelongsToMany
    {
        return $this->belongsToMany(ProjectExample::class);
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(ProjectResource::class, 'project_resource_project_question');
    }
}
