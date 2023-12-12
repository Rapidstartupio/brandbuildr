<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectQuestion;
use App\Models\UserProjectProgess;

class ProjectBlock extends Model
{
    use HasFactory;
    public $additional_attributes = ['full_admin_name'];
    public function questions()
    {
        return $this->hasMany(ProjectQuestion::class)->orderBy('order', 'ASC');
    }

    public function done($projectId)
    {
        $user = auth()->user();
        $progress = UserProjectProgess::where([
            'user_id' => $user->id,
            'done' => 1,
            'category' => 'block',
            'id_of_category' => $this->id,
            'project_id' => $projectId

        ])->first();
        if (isset($progress->done)) {
            return true;
        }
        return false;
    }

    public function getFullAdminNameAttribute()
    {
        return "{$this->admin_name} - {$this->name}";
    }
}
