<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PageDatatables;
use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\Typevenue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageDatatables $datatables)
    {
        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.pages'),
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

        return view('dashboard.pages.create');

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
            'title_ar' => 'required',
            'title_en' => 'required',
            'short_description_ar' => 'required',
            'short_description_en' => 'required',


        ]);

        Page::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.pages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Page::find($id);


        return view('dashboard.pages.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Page::find($id);


        return view('dashboard.pages.edit', compact('type'));

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
        $type = Page::find($id);

        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'short_description_ar' => 'required',
            'short_description_en' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Page::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Page::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
