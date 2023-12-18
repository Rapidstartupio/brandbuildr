<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImporterLog extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'name', 'data'];

    protected $casts = [
        'data' => 'array',
    ];
}
