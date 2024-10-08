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
        'user_id',
        'order_date',
        'username',
        'total_food',
        'total_wood',
        'total_steel',
        'total_oil',
    ];
}
