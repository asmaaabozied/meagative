<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\DataTables\OfferDatatables;
use App\Http\Controllers\Controller;

use App\Models\Offer;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfferDatatables $offers)
    {


        return $offers->render('dashboard.offers.index', [
            'title' => trans('site.offers'),
            'count'=> $offers->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Venue::get()->pluck('name', 'id');

        return view('dashboard.offers.create', compact('halls'));

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
            'start_at' => 'required',
            'end_at' => 'required',
            'discount' => 'required',
            'venue_id' => 'required',


        ]);

        Offer::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.offers.index');

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
        $offer = Offer::find($id);

        $halls = Venue::get()->pluck('name', 'id');

        return view('dashboard.offers.edit', compact('offer', 'halls'));

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
        $offer = Offer::find($id);
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
            'discount' => 'required',
            'venue_id' => 'required',


        ]);


        $offer->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
