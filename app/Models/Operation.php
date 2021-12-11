<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Operation extends Model
{
    protected $table = "operations";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;


}
