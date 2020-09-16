<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = "restaurants";

    public $timestamps = false;

    protected $casts = [
        'enabled' => 'boolean'
    ];

    protected $fillable = [
        'id', 'name', 'time_closed', 'site_url', 'enabled'
    ];
}
