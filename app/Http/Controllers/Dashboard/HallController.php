<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\HallDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\File;
use App\Models\Typevenue;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HallDatatables $datatables)
    {


        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.halls'),
            'count' => $datatables->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $types = Typevenue::get()->pluck('name', 'id');

        return view('dashboard.halls.create', compact('countries', 'cities', 'customers', 'types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    function str_random($length = 4)
    {
        return Str::random($length);
    }

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'capacity' => 'required|integer',
            'capacity_female' => 'required|integer',
            'image' => 'required',
            'images' => 'required|max:2048',

            'capacity_male' => 'required|integer',
            'capacity_childrens' => 'required|integer',
            'capacity_babies' => 'required|integer',
            'latitude' => 'required',
            'longitude' => 'required',
            'time_open' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'time_close' => 'required',
            'address_ar' => 'required',

            'address_en' => 'required',
            'customer_id' => 'required|integer',
            'venue_type_id' => 'required|integer',


        ]);

        $hall = Venue::create($request->except('image', 'images'));


        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $hall->image = $filename;
            $hall->save();
        }

        if ($request->hasFile('images')) {
            $imagess = $request->file('images');

            foreach ($imagess as $images) {
                $img = "";
                $img = $this->str_random(4) . $images->getClientOriginalName();
                $originname = time() . '.' . $images->getClientOriginalName();
                $filename = $this->str_slug(pathinfo($originname, PATHINFO_FILENAME), "-");
                $filename = $images->hashName();
                $extention = pathinfo($originname, PATHINFO_EXTENSION);
                $img = $filename;


                $destintion = 'uploads';
                $images->move($destintion, $img);
                $image = new \App\Models\File();
                $image->encrypt_name = $img;
                $image->file_name = $images->getClientOriginalName();
                $image->table_id = $hall->id;
                $image->module_name = 'venues';
                $image->field_name = 'images';
                $image->table_name = 'venues';
                $image->save();

            }
        }


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.halls.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hall = Venue::find($id);

        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $types = Typevenue::get()->pluck('name', 'id');

        return view('dashboard.halls.show', compact('hall', 'countries', 'cities', 'customers', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hall = Venue::find($id);

        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $types = Typevenue::get()->pluck('name', 'id');

        return view('dashboard.halls.edit', compact('hall', 'countries', 'cities', 'customers', 'types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hall = Venue::find($id);

        $request->validate([
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'capacity_female' => 'required',


            'capacity_male' => 'required',
            'capacity_childrens' => 'required',
            'capacity_babies' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'time_open' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'time_close' => 'required',
            'address_ar' => 'required',

            'address_en' => 'required',
            'customer_id' => 'required',
            'venue_type_id' => 'required',


        ]);

        $hall->update($request->except('image', 'images'));

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $hall->image = $filename;
            $hall->save();
        }

        if ($request->hasFile('images')) {

            File::where('table_id', $hall->id)->where('module_name', 'venues')->delete();
            $imagess = $request->file('images');

            foreach ($imagess as $images) {
                $img = "";
                $img = $this->str_random(4) . $images->getClientOriginalName();
                $originname = time() . '.' . $images->getClientOriginalName();
                $filename = $this->str_slug(pathinfo($originname, PATHINFO_FILENAME), "-");
                $filename = $images->hashName();
                $extention = pathinfo($originname, PATHINFO_EXTENSION);
                $img = $filename;


                $destintion = 'uploads';
                $images->move($destintion, $img);
                $image = new \App\Models\File();
                $image->encrypt_name = $img;
                $image->file_name = $images->getClientOriginalName();
                $image->table_id = $hall->id;
                $image->module_name = 'venues';
                $image->field_name = 'images';
                $image->table_name = 'venues';
                $image->save();

            }
        }


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.halls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::find($id);
        $venue->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Venue::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
