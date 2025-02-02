<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'name',
        'path',
        'outputs',
        'type'
    ];

    protected $casts = [
        'outputs' => 'array',
    ];
}
