<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Venue extends Model
{
    protected $table = "venues";

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(File::class, 'table_id')->where('table_name','venues');;

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

    public function customers()
    {

        return $this->belongsToMany(customer::class, 'favorites');

    }

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


    public function type()
    {

        return $this->belongsTo(Typevenue::class, 'venue_type_id')->withDefault();

    }

    public function venueratings()
    {
        return $this->hasMany(Venues_rating::class);
    }


    public function favourite(){
        return $this->hasOne(Customer_Venue::class)->where('customer_id',Auth::guard('customer')->loginUsingId(1)->id);
    }
}
