<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectBlock;

class ProjectSection extends Model
{
    use HasFactory;
    public function blocks()
    {
        return $this->hasMany(ProjectBlock::class)->orderBy('order', 'ASC');
    }

    public function currentBlock()
    {
        return $this->blocks->first();
    }
}
