<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Wave\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'verification_code',
        'verified',
        'trial_ends_at',
        'theme',
        'theme_dark_logo',
        'theme_light_logo',
        'theme_text_color',
        'theme_line_color'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    public function projectTypes()
    {
        return $this->hasMany('\App\Models\ProjectType')->orderBy('created_at', 'DESC');
    }
    public function clients()
    {
        return $this->hasMany('\App\Models\Client')->orderBy('created_at', 'DESC');
    }

    public function projects()
    {
        return $this->hasMany('\App\Models\Project')->orderBy('created_at', 'DESC');
    }
}
