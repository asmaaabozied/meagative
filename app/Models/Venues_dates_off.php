<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_dates_off extends Model
{
   protected $table="venues_dates_off";

   protected $guarded=[];

    public function venue()
    {

        return $this->belongsTo(Venue::class, 'venue_id')->withDefault();

    }
}
