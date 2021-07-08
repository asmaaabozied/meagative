<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RoleDatatables;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class RoleController extends Controller
{
    public function __construct()
    {


    }//end of constructor

    public function index(RoleDatatables $roles)
    {
        return $roles->render('dashboard.roles.index', [
            'title' => trans('site.roles'),
            'count'=> $roles->count()
        ]);



    }//end of index

    public function create()
    {

        $models = ['sliders','notification','visitors','paymentss','planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $maps = ['create', 'update', 'read', 'delete'];

        $mapss = Mapss;
        return view('dashboard.roles.create', compact('models', 'maps', 'mapss'));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
//            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();

        $role = role::create($request_data);


        if ($request->has('permissions'))
            $role->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.roles.index');

    }//end of store

    public function edit(role $role)
    {
        $models = ['sliders','notification','visitors','paymentss','planers','inquiries','users', 'countries', 'cities', 'customers', 'typevenues', 'halls', 'events', 'categories', 'booking', 'services', 'pages', 'roles','settings','offers'];
        $maps = ['create', 'update', 'read', 'delete'];
        $mapss = Mapss;
        return view('dashboard.roles.edit', compact('role', 'models', 'maps', 'mapss'));

    }//end of role

    public function update(Request $request, role $role)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
//            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();


        $role->update($request_data);

        if ($request->has('permissions'))
            $role->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.roles.index');

    }//end of update

    public function destroy(role $role)
    {

        $role->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.roles.index');

    }//end of destroy

}//end of controller
