<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\DayHallDatatables;
use App\DataTables\TypeHallDatatables;
use App\Http\Controllers\Controller;

use App\Models\Typevenue;
use App\Models\Venue;
use App\Models\Venues_days_price;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VenuedayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DayHallDatatables $types)
    {


        return $types->render('dashboard.venuesdays.index', [
            'title' => trans('site.venuesdays'),
            'count'=> $types->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = Venue::get()->pluck('name', 'id');

        return view('dashboard.venuesdays.create', compact('venues'));

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
            'price' => 'required',
            'day_of_week' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'venue_id' => 'required',

        ]);

        Venues_days_price::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.venuesdays.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Venues_days_price::find($id);



        $venues = Venue::get()->pluck('name', 'id');


        return view('dashboard.venuesdays.show', compact('type','venues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Venues_days_price::find($id);

        $venues = Venue::get()->pluck('name', 'id');


        return view('dashboard.venuesdays.edit', compact('type','venues'));

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
        $type = Venues_days_price::find($id);

        $request->validate([
            'price' => 'required',
            'day_of_week' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'venue_id' => 'required',

        ]);

        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.venuesdays.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Venues_days_price::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
