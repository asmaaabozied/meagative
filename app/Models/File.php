<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $table = "files";

    protected $guarded = [];

    public function Venue()
    {

        return $this->belongsTo(Venue::class, 'table_id')->withDefault();

    }

    public function planner()
    {

        return $this->belongsTo(Planner::class, 'table_id')->withDefault();

    }
}
