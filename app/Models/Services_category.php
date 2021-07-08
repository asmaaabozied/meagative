<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services_category extends Model
{

    protected $table = "services_categories";

    protected $guarded = [];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
