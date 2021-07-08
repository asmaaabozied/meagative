<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_rating extends Model
{
    protected $table = "services_ratings";

    protected $guarded = [];


    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function service()
    {

        return $this->belongsTo(Service::class, 'services_id')->withDefault();

    }
}
