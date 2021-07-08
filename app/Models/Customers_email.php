<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers_email extends Model
{
    protected $table = "customers_emails";

    protected $fillable = ['customer_id','email','email_verified','email_verification_code','identity_type'];

//    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id')->withDefault();

    }
}
