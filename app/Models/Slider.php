<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table="slider";

    protected $fillable=['title_ar','title_en','image','description_ar','description_en'];

    public function getTitleAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->title_ar : $this->title_en;
    }


//    public function getImageAttribute()
//    {
//        return '<img src="{{asset(\'public/uploads/\'. $this->image)}}" border="0" width="10" class="img-rounded" align="center" />';
////        return asset('public/uploads/'. $this->image);
//
//    }//end of get image path

}
