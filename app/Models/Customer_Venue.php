<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer_Venue extends Model
{
    protected $table = "favorites";
    protected $guarded = [];

    public $timestamps = false;
}
