<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagesModel extends Model
{
    protected $table = 'packages';
    protected $fillable = [
        'package_name',
        'price'
    ];
}
