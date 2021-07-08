<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CatogeryDatatables;
use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class CatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CatogeryDatatables $datatables)
    {

        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.categories'),
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

        return view('dashboard.catogeries.create');

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
            'image'=>'required'


        ]);

      $cat= Category::create($request->all());

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $cat->image = $filename;
            $cat->save();
        }

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.catogeries.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catogery = Category::find($id);


        return view('dashboard.catogeries.show', compact('catogery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catogery = Category::find($id);


        return view('dashboard.catogeries.edit', compact('catogery'));

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
        $type = Category::find($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);
        $type->update($request->all());

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $type->image = $filename;
            $type->save();
        }

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.catogeries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Category::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Category::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
