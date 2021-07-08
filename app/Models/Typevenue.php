<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typevenue extends Model
{
    protected $table = "venues_types";
    protected $guarded = [];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function venues()
    {

        return $this->hasMany(Venue::class, 'venue_type_id')->withDefault();

    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
