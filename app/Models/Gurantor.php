<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Gurantor extends Model
{
    protected $table = "gurantors";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;

}
