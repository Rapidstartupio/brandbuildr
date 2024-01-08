<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectSection;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'icon_svg_path_d', 'active', 'status', 'user_id','svg'];

    public function sections()
    {
        return $this->hasMany(ProjectSection::class)->orderBy('order', 'ASC');
    }
}
