<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   protected $table="events";

   protected $guarded=[];

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function getDescriptionAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->description_ar : $this->description_en;
    }

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
