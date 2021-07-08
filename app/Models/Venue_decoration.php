<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue_decoration extends Model
{

    protected $table = 'venues_decoration';

    protected $guarded = [];



    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
