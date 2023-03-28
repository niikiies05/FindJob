<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtype extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
