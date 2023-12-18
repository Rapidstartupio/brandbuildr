<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectBlock;
use App\Models\UserProjectProgess;

class ProjectSection extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'project_type_id', 'order'];
    public function blocks()
    {
        return $this->hasMany(ProjectBlock::class)->orderBy('order', 'ASC');
    }

    function activeBlocks()
    {
        $blocks = $this->blocks;
        return $blocks;
    }

    public function currentBlock()
    {
        return $this->blocks->first();
    }

    public function done()
    {
        $user = auth()->user();
        $progress = UserProjectProgess::where([
            'user_id' => $user->id,
            'done' => 1,
            'category' => 'section',
            'id_of_category' => $this->id
        ])->first();
        if (isset($progress->done)) {
            return true;
        }
        return false;
    }
}
