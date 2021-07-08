<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_equipment extends Model
{
    protected $table = "venues_equipments";

    protected $guarded = [];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
