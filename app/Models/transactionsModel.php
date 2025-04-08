<?php

namespace App\Models;

use App\HasUUID;
use Illuminate\Database\Eloquent\Model;

class transactionsModel extends Model
{
    use HasUUID;
    protected $table = 'transactions';
    protected $fillable = ['payment_method', 'payment_status', 'order_id'];
}
