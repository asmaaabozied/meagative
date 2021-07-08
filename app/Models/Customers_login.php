<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers_login extends Model
{
    //

    protected $table="customers_login";

    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
