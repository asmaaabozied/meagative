<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    protected $table = "planners";
    protected $guarded = [];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function getAddressAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->address_ar : $this->address_en;
    }

    public function getDescriptionAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->description_ar : $this->description_en;
    }

    public function images()
    {
        return $this->hasMany(File::class, 'table_id')->where('table_name','planners');

    }//end of images

    public function country()
    {

        return $this->belongsTo(Country::class, 'country_id')->withDefault();

    }

    public function city()
    {

        return $this->belongsTo(City::class, 'city_id')->withDefault();

    }

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
