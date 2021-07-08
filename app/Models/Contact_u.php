<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_u extends Model
{
    protected $table="contact_us";

    protected $guarded=[];

    public function country()
    {

        return $this->belongsTo(Country::class, 'country_id')->withDefault();

    }

}
