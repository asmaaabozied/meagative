<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table="inquiries";

    protected $guarded=[];

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function event()
    {

        return $this->belongsTo(Event::class, 'event_id')->withDefault();

    }

    public function planer()
    {

        return $this->belongsTo(Planner::class, 'planner_id')->withDefault();

    }
}
