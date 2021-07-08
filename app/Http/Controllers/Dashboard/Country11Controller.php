<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;

use Illuminate\Support\Str;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;


class Country11Controller extends Controller
{

    public function index(Request $request)
    {

        $lang = app()->getLocale();

        $countries = Country::latest()->paginate(Paginate_number);
        return $countries;

        return view('dashboard.countries.index', compact('countries', 'lang'));

    }//end of index


    public function create()
    {

        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }//end of create

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'mobile' => 'required|string|unique:users',

            'password' => 'required',
//                'password' => 'required|confirmed|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[!@$%^&*]/ ',
            'roles' => 'required'
        ],
            [
//                'password.regex'=> __("site.password_regex"),
                'roles.required' => __("site.roles_required"),
            ]
        );

//

        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);


        $user['password'] = bcrypt($request->password);


        // To Make User Active
        $request_data['status'] = 1;

        $user = User::create([
            'username' => $request->name,
            'full_name_ar' => $request->full_name_ar,
            'full_name_en' => $request->full_name_en,
            'email' => $request->email,
            'mobile' => $request->mobile


        ]);
        // $user->attachRole('admin');
        $user->syncRoles($request->roles);


        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of store

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }//end of user

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'mobile' => ['required', Rule::unique('users')->ignore($user->id),],

        ]);

        $request_data = $request->except(['permissions']);


        $user->update([
            'username' => $request->name,
            'full_name_ar' => $request->full_name_ar,
            'full_name_en' => $request->full_name_en,
            'email' => $request->email,
            'mobile' => $request->mobile
        ]);


        if (isset($request->roles)) $user->syncRoles($request->roles);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update

    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
//        return redirect()->route('dashboard.users.index');

    }//end of destroy

    public function block($user_id)
    {
        $info = User::find($user_id);
        $status = ($info->status == 0) ? 1 : 0;
        $info->status = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;
        if ($status == 0) {
            DB::table('oauth_access_tokens')
                ->where('user_id', $user_id)
                ->delete();
        }

    }//end of update


}//end of controller
