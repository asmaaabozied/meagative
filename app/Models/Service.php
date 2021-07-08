<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   protected $table="services";

   protected $guarded=[];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->description_ar : $this->description_en;
    }


    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function catogery()
    {

        return $this->belongsTo(Services_category::class, 'category_id')->withDefault();

    }

}
