<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    protected $table = "orders";

    protected $casts = [
        'paid' => 'boolean'
    ];

    protected $fillable = [ 
        'id', 'name', 'email', 'bestelling', 'restaurant', 'amount', 'paid', 'datum', 'tikkielink'
    ];

}
