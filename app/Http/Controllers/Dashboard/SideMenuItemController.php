<?php


namespace App\Http\Controllers\Dashboard;


use App\Models\SideMenuItem;
use App\Models\SideMenuSection;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class SideMenuItemController
{

    protected $model = SideMenuItem::class;

    public function index() {

        $data = [];
        $data['model'] = $this->model;
        $data['roles'] = Role::all();
        $data['sections'] = SideMenuSection::get()->pluck('name', 'id');

        $data['models'] = ['planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $data['maps'] = ['read'];
        $data['mapss'] = Mapss;
        return view('dashboard.sidemenu.side_menu_manager.create', $data);
    }

    public function create() {
        $data = [];
        $data['model'] = $this->model;
        $data['roles'] = Role::all();
        $data['sections'] = SideMenuSection::get()->pluck('name', 'id');

        $data['models'] = ['planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $data['maps'] = ['read'];
        $data['mapss'] = Mapss;
        return view('dashboard.sidemenu.side_menu_manager.create', $data);
    }

    public function store() {

        request()->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'path' => 'required|string',
            'icon' => 'required|string',
            'section_id' => 'required',
            'permissions' => 'required',
            'roles' => 'required'
        ],
            [
                'roles.required' => __("site.roles_required"),
                'section_id.required' => __("site.required"),
            ]
        );

        $newItem = SideMenuItem::create([
            'name_ar' => request('name_ar'),
            'name_en' => request('name_en'),
            'section_id' => \request('section_id'),
            'path' => \request('path'),
            'icon' => \request('icon'),
            'sort' => 0,
            'is_active' => \request('is_active')
        ]);
        $newItem->roles()->attach(request('roles'));
        $permissions = request('permissions');
        foreach ($permissions as $permission) {
            $permObbject = Permission::where('name', $permission)->first();
            $newItem->permissions()->attach($permObbject->id);
        }
        return back();
    }

    public function update($id) {

    }

    public function edit($id) {

    }

    public function saveMenuItem(Request $request) {
        $post = $request->input('menus');
        $isActive =  $request->input('isActive');
        $section = $request->input('section');
        $sectionId = preg_replace('/[^0-9]/', '', $section);

        $post = json_decode($post,true);


        $savedArray = [];
        $i = 1;
        foreach($post[0] as $ro) {

            $pid = $ro['id'];
            if(isset($ro['children'])) {
                $ci = 1;
                foreach($ro['children'][0] as $c) {
                    $cpid = $c['id'];
                    if(isset($c['children'][0])) {
                        $subCi = 1;
                        foreach($c['children'][0] as $subC) {
                            $id = $subC['id'];
                            SideMenuItem::where('id',$id)->update(['sort'=>$subCi,'parent_id'=>$cpid,'is_active'=>$isActive,
                                'section_id' => $sectionId]);
                            $subCi++;
                        }
                    }
                    $id = $c['id'];
                    SideMenuItem::where('id',$id)->update(['sort'=>$ci,'parent_id'=>$pid,'is_active'=>$isActive,
                        'section_id' => $sectionId]);
                    $ci++;
                }
            }
            array_push($savedArray, $ro);

            SideMenuItem::where('id',$pid)->update(['sort'=>$i,'parent_id'=>0,'is_active'=>$isActive,
                'section_id' => $sectionId]);
            $i++;
        }
        return response()->json(['success'=>true, 'list' => $savedArray]);
    }

}
