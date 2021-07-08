<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_rating extends Model
{
    protected $table = "venues_ratings";

    protected $guarded = [];

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function venue()
    {

        return $this->belongsTo(Venue::class, 'venue_id')->withDefault();

    }
}
