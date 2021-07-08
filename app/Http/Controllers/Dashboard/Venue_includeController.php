<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\VenueincludeDatatables;
use App\Http\Controllers\Controller;

use App\Models\Typevenue;
use App\Models\Venues_include;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Venue_includeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VenueincludeDatatables $datatables)
    {

        return $datatables->render('dashboard.venuesdays.index', [
            'title' => trans('site.venues_includes'),
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

        return view('dashboard.venues_includes.create');

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
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);

       Venues_include::create($request->except(['_token','_method']));


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.venues_includes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Venues_include::find($id);


        return view('dashboard.venues_includes.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Venues_include::find($id);


        return view('dashboard.venues_includes.edit', compact('type'));

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
        $type = Venues_include::find($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.venues_includes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type =Venues_include::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
