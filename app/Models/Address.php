<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Address extends Model
{
    protected $table = "addresses";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;


}
