<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'icon_svg_path_d', 'active', 'status', 'user_id'];

    public function sections()
    {
        return $this->hasMany(ProjectSection::class)->orderBy('order', 'ASC');
    }
}
