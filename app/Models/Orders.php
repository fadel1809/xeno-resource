<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Orders extends Model
{
    use HasFactory,Notifiable,HasApiTokens;
     protected $fillable = [
        'food',
        'wood',
        'steel',
        'oil',
        'user_id',
        'order_date',
        'username'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
