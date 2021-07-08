<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDatatables $cities)
    {

        return $cities->render('dashboard.datatable', [
            'title' => trans('site.cities'),
            'count'=> $cities->count()
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


        return view('dashboard.cities.create', compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
            'country_id' => 'required',


        ]);

        City::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.cities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        $countries = Country::get()->pluck('name', 'id');

        return view('dashboard.cities.edit', compact('city', 'countries'));

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
        $city = City::find($id);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required',
            'country_id' => 'required',

        ]);


        $city->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = City::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
