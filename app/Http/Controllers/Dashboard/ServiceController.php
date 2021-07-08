<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ServiceDatatables;
use App\Http\Controllers\Controller;
use App\Models\Services_category;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use App\Models\customer;
use App\Models\Event;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDatatables $datatables)
    {

        return $datatables->render('dashboard.datatable', [
            'title' => trans('site.services'),
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
        $cats = Services_category::get()->pluck('name', 'id');
        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.services.create', compact('cats', 'customers'));

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
            'description_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',

            'price' => 'required',
            'customer_id' => 'required',
            'category_id' => 'required',
            'image' => 'required'


        ]);

        $service = Service::create($request->except('image'));

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $service->image = $filename;
            $service->save();
        }


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.services.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Service::find($id);
        $cats = Services_category::get()->pluck('name', 'id');
        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.services.show', compact('event', 'cats', 'customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Service::find($id);
        $cats = Services_category::get()->pluck('name', 'id');
        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.services.edit', compact('event', 'cats', 'customers'));

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
        $service = Service::find($id);

        $request->validate([
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',

            'price' => 'required',
            'customer_id' => 'required',
            'category_id' => 'required',


        ]);

        $service->update($request->except('image'));


        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $service->image = $filename;
            $service->save();
        }


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Service::find($id);
        $event->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Service::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
