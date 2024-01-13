<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAiUsage extends Model
{
    use HasFactory;
    protected $fillable = ['project_question_id', 'project_id', 'user_id'];
}
