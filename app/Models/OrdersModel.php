<?php

namespace App\Models;

use App\HasUUID;
use Illuminate\Database\Eloquent\Model;


class OrdersModel extends Model
{
    use HasUUID;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_status',
        'total_weight',
        'total_items',
        'package_id',
        'total_amount',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(PackagesModel::class, 'package_id');
    }

    public function transaction()
    {
        return $this->hasOne(transactionsModel::class, 'order_id');
    }
}
