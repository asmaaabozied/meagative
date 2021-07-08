<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class customer extends Authenticatable
{
    protected $table = "customers";
    protected $guarded = [];

    public function country()
    {

        return $this->belongsTo(Country::class, 'country_id')->withDefault();

    }

    public function city()
    {

        return $this->belongsTo(City::class, 'city_id')->withDefault();

    }

    public function venues()
    {
        return $this->belongsToMany(Venue::class, 'favorites');
    }

    public function favourite()
    {
        return $this->hasMany(Customer_Venue::class)->where('customer_id', Auth::guard('customer')->loginUsingId(1)->id);
    }

    public function venueratings()
    {
        return $this->hasMany(Venues_rating::class);
    }

    public function customeremail()
    {
        return $this->hasMany(Customers_email::class, 'customer_id');
    }

}
