<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerdata extends Model
{
    use HasFactory;
    protected $table = 'customerdata';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'delivery_status',
        'product_names',
    ];
}