<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class order_details extends Model
{
        use HasFactory,Notifiable,HasApiTokens;
        protected $fillable = [
        'user_id',
        'order_id',
        'food',
        'wood',
        'steel',
        'oil',
        'delivery_time'
    ];
}
