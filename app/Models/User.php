<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'about_yourself',
        'role',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data' => 'array', 
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function userRole()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role', 'id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function credit()
    {
        return $this->hasOne(Credit::class);
    }

}
