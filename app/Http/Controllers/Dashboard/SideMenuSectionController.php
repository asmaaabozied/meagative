<?php


namespace App\Http\Controllers\Dashboard;


use App\Models\SideMenuSection;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class SideMenuSectionController
{

    protected $model = SideMenuSection::class;

    public function index() {

        $data = [];
        $data['model'] = $this->model;
        $data['roles'] = Role::all();

        $data['models'] = ['planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $data['maps'] = ['read'];
        $data['mapss'] = Mapss;
        return view('dashboard.sidemenu.side_section_manager.create', $data);
    }

    public function create() {
        $data = [];
        $data['model'] = $this->model;
        $data['roles'] = Role::all();

        $data['models'] = ['planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $data['maps'] = ['read'];
        $data['mapss'] = Mapss;


        return view('dashboard.sidemenu.side_section_manager.create', $data);
    }

    public function store() {

        request()->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'roles' => 'required',
        ],
            [
                'roles.required' => __("site.roles_required"),
            ]
        );

        $newSection = SideMenuSection::create([
            'name_ar' => request('name_ar'),
            'name_en' => request('name_en'),
            'sort' => 0,
            'is_active' => true
        ]);
        $newSection->roles()->attach(request('roles'));


        return back();
    }

    public function saveSectionItem(Request $request) {
        $post = $request->input('menus');
        $isActive =  $request->input('isActive');
        $post = json_decode($post,true);

        $savedArray = [];
        $i = 1;
        foreach($post[0] as $ro) {

            $pid = $ro['id'];
            array_push($savedArray, $ro);

            SideMenuSection::where('id',$pid)->update(['sort'=>$i,'is_active'=>$isActive]);
            $i++;
        }
        return response()->json(['success'=>true, 'list' => $savedArray]);
    }

    public function update($id) {

    }

    public function edit($id) {

    }
}
