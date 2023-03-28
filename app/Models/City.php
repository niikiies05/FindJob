<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'region_id'
    ];

    // public function neighbourhood()
    // {
    //     return $this->hasMany(District::class);
    // }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
