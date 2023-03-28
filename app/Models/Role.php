<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Permission;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'guard_name'];

    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
