<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Citizen extends Model
{
    protected $table = "citizens";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;


}
