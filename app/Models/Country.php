<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   protected $table="countries";
   protected $guarded=[];

    public function cities()
    {

        return $this->hasMany(City::class, 'country_id');

    }

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
