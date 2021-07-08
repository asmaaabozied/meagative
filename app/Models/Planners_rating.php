<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planners_rating extends Model
{
    protected $table = "planners_ratings";

    protected $guarded = [];


    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

    public function planner()
    {

        return $this->belongsTo(Planner::class, 'planner_id')->withDefault();

    }

}
