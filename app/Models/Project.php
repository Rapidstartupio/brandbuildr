<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;
use App\Models\Client;
use App\Models\ProjectDeadline;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'name', 'client_id', 'description', 'deadline', 'user_id', 'start_date', 'end_date'];

    public function type()
    {
        return $this->belongsTo(ProjectType::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deadlines()
    {
        return $this->hasMany(ProjectDeadline::class)->orderBy('end_date', 'DESC');
    }
}
