<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\VenuerateDatatables;
use App\Http\Controllers\Controller;

use App\Models\customer;
use App\Models\Planner;
use App\Models\Planners_rating;
use App\Models\Typevenue;
use App\Models\Venue;
use App\Models\Venues_rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VratingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VenuerateDatatables $datatables)
    {
        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.venues_ratings'),
            'count'=> $datatables->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = customer::get()->pluck('name', 'id');

        $planners = Venue::get()->pluck('name', 'id');

        return view('dashboard.venues_ratings.create', compact('customers', 'planners'));

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
            'venue_id' => 'required',
            'customer_id' => 'required',
            'description' => 'required',
            'datetime' => 'required',


        ]);

        Venues_rating::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.venues_ratings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Venues_rating::find($id);

        $customers = customer::get()->pluck('name', 'id');

        $planners = Venue::get()->pluck('name', 'id');


        return view('dashboard.venues_ratings.show', compact('type','customers','planners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Venues_rating::find($id);

        $customers = customer::get()->pluck('name', 'id');

        $planners = Venue::get()->pluck('name', 'id');


        return view('dashboard.venues_ratings.edit', compact('type','customers','planners'));

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
        $type = Venues_rating::find($id);

        $request->validate([
            'venue_id' => 'required',
            'customer_id' => 'required',
            'description' => 'required',
            'datetime' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.venues_ratings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Venues_rating::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Venues_rating::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
