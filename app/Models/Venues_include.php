<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venues_include extends Model
{
    protected $table = 'venues_includes';

    protected $guarded = [];



  public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
