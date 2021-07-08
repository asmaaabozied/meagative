<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_days_price extends Model
{
    protected $table = "venues_days_prices";

    protected $guarded = [];

    public function venue()
    {

        return $this->belongsTo(Venue::class, 'venue_id')->withDefault();

    }
}
