<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $table="categories";

    protected $guarded=[];

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
