<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectSection;
use TCG\Voyager\Models\Role;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'icon_svg_path_d', 'active', 'status', 'user_id', 'svg'];

    public function sections()
    {
        return $this->hasMany(ProjectSection::class)->orderBy('order', 'ASC');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'project_type_roles', 'project_type_id', 'role_id');
    }
}
