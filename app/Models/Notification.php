<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = "notifications";

    protected $guarded = [];

    public $timestamps = false;

    public function getTitleAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->title_ar : $this->title_en;
    }

    public function getContentAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->content_ar : $this->content_en;
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_ids')->withDefault();

    }
}
