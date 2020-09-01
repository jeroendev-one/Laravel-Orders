<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    public $timestamps = false;

    protected $table = "orders";

    protected $fillable = [ "id", "naam", "email", "bestelling", "restaurant", "amount", "datum" ];

}
