<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TypeHallDatatables;
use App\Http\Controllers\Controller;

use App\Models\customer;
use App\Models\Typevenue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TypeHallDatatables $types)
    {


        return $types->render('dashboard.datatable', [
            'title' => trans('site.typevenues'),
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
        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.typevenues.create',compact('customers'));

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

        Typevenue::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.typevenues.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Typevenue::find($id);

        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.typevenues.show', compact('type','customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Typevenue::find($id);

        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.typevenues.edit', compact('type','customers'));

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
        $type = Typevenue::find($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.typevenues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Typevenue::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Typevenue::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
