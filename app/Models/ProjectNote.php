<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProjectNote extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'content', 'project_question_id', 'project_id'];
    protected $dates = ['created_at', 'updated_at'];

    // Override the default accessor for the created_at attribute
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);

        // Format the date as desired (12/01/24)
        return $carbonDate->format('d/m/y');
    }
}
