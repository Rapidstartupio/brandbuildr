<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ProjectPrompt;
use App\Models\ProjectAnswer;

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

    public function prompt()
    {
        return $this->belongsTo(ProjectPrompt::class, 'project_prompt_id');
    }
    public function finalPrompt()
    {
        if (isset($this->prompt->prompt)) {
            $prompt = $this->prompt->prompt;
        }
        return null;
    }

    public function answer($user_id)
    {
        return ProjectAnswer::where('user_id', $user_id)->where('project_question_id', $this->id)->first();
    }
}
