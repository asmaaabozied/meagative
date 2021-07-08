<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $table="pages";

   protected $guarded=[];

    public function getTitleAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->title_ar : $this->title_en;
    }


    public function getShortDescriptionAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->short_description_ar : $this->short_description_en;
    }

}
