<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customers_bank extends Model
{
    protected $table = "customers_banks";

    protected $guarded = [];

    public $timestamps = false;


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault();

    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
