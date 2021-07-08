<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages_replie extends Model
{
    protected $table="messages_replies";

    protected $guarded=[];

    public function customer()
    {

        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }

}
