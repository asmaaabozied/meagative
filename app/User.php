<?php


namespace App;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use Laratrust\Traits\LaratrustUserTrait;

// use Modules\



class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
//    protected $appends=['full_name'];





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */



    public function GetFullNameAttribute()
    {
        if(app()->getLocale()=='ar'){
          return  $this->full_name_ar;
        }else{
          return  $this->full_name_en;
        }
    }



}//end of model
