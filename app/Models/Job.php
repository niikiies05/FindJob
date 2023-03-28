<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory;
    use Notifiable;

    protected $casts = [
        'data' => 'array', 
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salarytype()
    {
        return $this->belongsTo(Salarytype::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function jobtype()
    {
        return $this->belongsTo(Jobtype::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByLoggedInUser()
    {
        return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false : true;
    }

}
