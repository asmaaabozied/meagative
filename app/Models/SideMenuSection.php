<?php


namespace App\Models;


use App\Helpers\CrudHelper;
use App\Permission;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class SideMenuSection extends Model
{
    protected $table = 'sidemenu_sections';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'role_id',
        'name_ar',
        'name_en',
        'sort',
        'is_active'
    ];
    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];


    public function getActiveStatus() {
        return CrudHelper::getBooleanBadge($this->id, $this->table, 'is_active');
    }

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_'.$this->table, 'sidemenu_section_id');
    }

    public function items() {
        return $this->hasMany(SideMenuItem::class, "section_id");
    }
}
