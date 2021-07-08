<?php


namespace App\Models;


use App\Helpers\CrudHelper;
use App\Permission;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class SideMenuItem extends Model
{

    protected $table = 'sidemenu_items';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'section_id',
        'parent_id',
        'role_id',
        'name_ar',
        'name_en',
        'type',
        'path',
        'icon',
        'sort',
        'is_active'
    ];
    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];

    public function getIcon() {
        return CrudHelper::getIconBadge($this->id, $this->table, 'icon');
    }
    public function getActiveStatus() {
        return CrudHelper::getBooleanBadge($this->id, $this->table, 'is_active');
    }

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_'.$this->table, 'sidemenu_item_id');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permissions_'.$this->table, 'sidemenu_item_id');
    }
    public function section() {
        return $this->belongsTo(SideMenuSection::class, 'section_id', 'id');
    }
    public function parent() {
        return $this->belongsTo(SideMenuItem::class, 'parent_id', 'id');
    }
}
