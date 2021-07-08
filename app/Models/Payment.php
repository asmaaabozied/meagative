<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $guarded = [];

//    public $timestamps = false;

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
