<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_status',
        'total_weight',
        'total_items',
        'package_id',
        'total_amout'
    ];
}
