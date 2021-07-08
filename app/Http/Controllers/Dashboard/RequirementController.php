<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RequirementDatatables;
use App\Http\Controllers\Controller;

use App\Models\Typevenue;
use App\Models\Venues_equipment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequirementDatatables $datatables)
    {

        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.requirements'),
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

        return view('dashboard.requirements.create');

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

        Venues_equipment::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.requirements.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Venues_equipment::find($id);


        return view('dashboard.requirements.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Venues_equipment::find($id);


        return view('dashboard.requirements.edit', compact('type'));

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
        $type = Venues_equipment::find($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.requirements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Venues_equipment::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Venues_equipment::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
