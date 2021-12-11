<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Job extends Model
{
    protected $table = "jobs";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;


}
