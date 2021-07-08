<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "booking";
    protected $guarded = [];

    public function venue()
    {

        return $this->belongsTo(Venue::class, 'venue_id')->withDefault();

    }

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function event()
    {

        return $this->belongsTo(Event::class, 'event_id')->withDefault();

    }
}
