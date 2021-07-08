<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PlannerDatatables;
use App\Http\Controllers\Controller;

use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\File;
use App\Models\Planner;
use App\Models\Typevenue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlannerDatatables $datatables)
    {

        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.planers'),
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

        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.planers.create', compact('countries', 'cities', 'customers'));

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
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


            'customer_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'address_ar' => 'required',
            'phone' => 'required',
            'address_en' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required',


        ]);

        $planner = Planner::create($request->except('images', 'image'));
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $planner->image = $filename;
            $planner->save();
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
                $image->table_id = $planner->id;
                $image->module_name = 'planners';
                $image->field_name = 'images';
                $image->table_name = 'planners';
                $image->save();

            }
        }


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.planers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planer = Planner::find($id);


        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.planers.show', compact('planer', 'countries', 'cities', 'customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planer = Planner::find($id);

        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.planers.edit', compact('planer', 'countries', 'cities', 'customers'));

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
        $type = Planner::find($id);



        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


            'customer_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'address_ar' => 'required',
            'phone' => 'required',
            'address_en' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required',


        ]);

        $type->update($request->except('image', 'images'));
        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $type->image = $filename;
            $type->save();
        }
        if ($request->hasFile('images')) {

            File::where('table_id', $type->id)->where('module_name', 'planners')->delete();
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
                $image->table_id = $type->id;
                $image->module_name = 'planners';
                $image->field_name = 'images';
                $image->table_name = 'planners';
                $image->save();

            }
        }

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.planers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Planner::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Planner::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
