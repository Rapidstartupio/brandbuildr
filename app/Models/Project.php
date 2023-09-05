<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'name', 'client_id', 'description', 'deadline', 'user_id'];

    public function type()
    {
        return $this->belongsTo(ProjectType::class);
    }
}
