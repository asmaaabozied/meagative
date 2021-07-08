<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_foods_drink extends Model
{
    protected $table = "venues_foods_drinks";

    protected $guarded = [];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
