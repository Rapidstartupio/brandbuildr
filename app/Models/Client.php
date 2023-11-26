<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['company_name', 'key_contact', 'phone_number', 'email', 'user_id', 'company_logo', 'tag', 'tag_color', 'tag_bg_color'];

    function nbProjects()
    {
        return Project::where('client_id', $this->id)->count();
    }
}
