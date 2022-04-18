<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $table = 'purchase_histories';

    protected $fillable = [
        'buyer',
        'description',
        'unit_price',
        'amount',
        'address',
        'provider',
    ];

    protected $hidden = [
        'updated_at'
    ];

}
