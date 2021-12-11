<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Card extends Model
{
    protected $table = "cards";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;


}
