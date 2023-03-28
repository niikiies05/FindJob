<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'notifications';

    protected $casts = [
    'data' => 'array',
];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
