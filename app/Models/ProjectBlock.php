<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectQuestion;

class ProjectBlock extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->hasMany(ProjectQuestion::class)->orderBy('order', 'ASC');
    }
}
