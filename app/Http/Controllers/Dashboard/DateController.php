<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Date_offHallDatatables;
use App\DataTables\DateHallDatatables;
use App\DataTables\DayHallDatatables;
use App\DataTables\TypeHallDatatables;
use App\Http\Controllers\Controller;

use App\Models\Typevenue;
use App\Models\Venue;
use App\Models\Venues_dates_off;
use App\Models\Venues_dates_price;
use App\Models\Venues_days_price;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Date_offHallDatatables $types)
    {


        return $types->render('dashboard.venuesdays.index', [
            'title' => trans('site.dates_off'),
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

        return view('dashboard.dates_off.create', compact('venues'));

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
            'date' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'venue_id' => 'required',

        ]);

        Venues_dates_off::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.dates_off.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Venues_dates_off::find($id);

        $venues = Venue::get()->pluck('name', 'id');


        return view('dashboard.dates_off.show', compact('type', 'venues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Venues_dates_off::find($id);

        $venues = Venue::get()->pluck('name', 'id');


        return view('dashboard.dates_off.edit', compact('type', 'venues'));

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
        $type = Venues_dates_off::find($id);

        $request->validate([
            'date' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'venue_id' => 'required',

        ]);

        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.dates_off.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Venues_dates_off::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
