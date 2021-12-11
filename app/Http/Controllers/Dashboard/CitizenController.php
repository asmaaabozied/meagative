<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDatatables;
use App\Models\Address;
use App\Models\Citizen;
use App\Models\City;
use App\Models\Country;
use App\Models\Gurantor;
use App\Models\Job;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Datatables;


class CitizenController extends Controller
{


    public function index()
    {
        return view('dashboard.users.index');

//        return $userDatatables->render('dashboard.datatable2', [
//            'title' => trans('site.users'),
//            'count' => $userDatatables->count()
//        ]);


    }//end of index


    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $jobs = Job::all();
        return view('dashboard.citizens.create', compact('jobs', 'countries', 'cities'));
    }//end of create

    public function store(Request $request)
    {


        $citizen = Citizen::create($request->except('fullname', 'card_number', 'phone', 'address1', 'street', 'address2', 'code', 'country_id', 'city_id'));
//upload image
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $citizen->image = $filename;
            $citizen->save();
        }
        if ($request->hasFile('file_name')) {
            $thumbnails = $request->file('file_name');
            $filenames = time() . '.' . $thumbnails->getClientOriginalExtension();
            Image::make($thumbnails)->resize(100, 100)->save(public_path('/uploads/' . $filenames));
            $citizen->file_name = $filenames;
            $citizen->save();
        }
        //create addresses
        Address::create([
            'address1' => $request['address1'],
            'street' => $request['street'],
            'address2' => $request['address2'],
            'code' => $request['code'],
            'country_id' => $request['country_id'],
            'city_id' => $request['city_id'],
            'citizen_id' => $citizen->id

        ]);
        //create gurantors
        foreach ($request->fullname as $key => $value)

            Gurantor::create([

                'fullname' => $request['fullname'][$key],
                'card_number' => $request['card_number'][$key],
                'phone' => $request['phone'][$key],
                'citizen_id' => $citizen->id
            ]);


        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.citizens.index');

    }//end of store

    public function edit($id)
    {

        $citizen = Citizen::find($id);
        $countries = Country::all();
        $cities = City::all();
        $jobs = Job::all();
        return view('dashboard.citizens.edit', compact('citizen', 'jobs', 'countries', 'cities'));
    }//end of user

    public function update(Request $request, $id)
    {


        $citizen = Citizen::find($id);

        $citizen->update($request->except('fullname', 'card_number', 'phone', 'address1', 'street', 'address2', 'code', 'country_id', 'city_id'));
        //upload image
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $citizen->image = $filename;
            $citizen->save();
        }
        if ($request->hasFile('file_name')) {
            $thumbnails = $request->file('file_name');
            $filenames = time() . '.' . $thumbnails->getClientOriginalExtension();
            Image::make($thumbnails)->resize(100, 100)->save(public_path('/uploads/' . $filenames));
            $citizen->file_name = $filenames;
            $citizen->save();
        }
        //create addresses
        Address::create([
            'address1' => $request['address1'],
            'street' => $request['street'],
            'address2' => $request['address2'],
            'code' => $request['code'],
            'country_id' => $request['country_id'],
            'city_id' => $request['city_id'],
            'citizen_id' => $citizen->id

        ]);
        //create gurantors
        foreach ($request->fullname as $key => $value)

            Gurantor::create([

                'fullname' => $request['fullname'][$key],
                'card_number' => $request['card_number'][$key],
                'phone' => $request['phone'][$key],
                'citizen_id' => $citizen->id
            ]);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.citizens.index');

    }//end of update

    public function destroy($id)
    {
        $citizen = Citizen::find($id);

        $citizen->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }//end of destroy


}//end of controller
