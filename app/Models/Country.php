<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'flag',
        'zip_code',
        'status'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function region()
    {
        return $this->hasMany(Region::class);
    }

}
