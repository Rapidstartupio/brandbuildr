<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;
use App\Models\Client;
use App\Models\ProjectDeadline;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\DB;

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

    public function blocks(): HasManyThrough
    {
        return $this->type->hasManyThrough(ProjectBlock::class, ProjectSection::class, 'project_type_id', 'project_section_id');
    }

    public function questions()
    {
        $user = auth()->user();
        $questions = DB::table('project_questions')
            ->join('project_blocks', 'project_blocks.id', '=', 'project_questions.project_block_id')
            ->join('project_sections', 'project_sections.id', '=', 'project_blocks.project_section_id')
            ->join('projects', 'projects.type_id', '=', 'project_sections.project_type_id')
            ->where('projects.id', $this->id)
            ->where('projects.user_id', $user->id)
            ->select('project_questions.*')
            ->get();
        return $questions;
    }

    public function answers()
    {
        $user = auth()->user();
        $questions = DB::table('project_answers')
            ->join('project_questions', 'project_questions.id', '=', 'project_answers.project_question_id')
            ->join('project_blocks', 'project_blocks.id', '=', 'project_questions.project_block_id')
            ->join('project_sections', 'project_sections.id', '=', 'project_blocks.project_section_id')
            ->join('projects', 'projects.type_id', '=', 'project_sections.project_type_id')
            ->where('projects.id', $this->id)
            ->where('project_answers.project_id', $this->id)
            ->where('project_answers.user_id', $user->id)
            ->where('project_answers.answer', '<>', '')
            ->select('project_answers.*')
            ->get();
        return $questions;
    }

    public function progress()
    {
        $nbAnswers = count($this->answers());
        $nbQuestions = count($this->questions());
        $progress =  number_format($nbAnswers / $nbQuestions * 100);
        return $progress;
    }

    public function status()
    {
        $nbAnswers = count($this->answers());
        $nbQuestions = count($this->questions());
        $progress =  number_format($nbAnswers / $nbQuestions * 100);
        $status = ($progress == 100) ? "1" : "0";
        return $status;
    }
}
