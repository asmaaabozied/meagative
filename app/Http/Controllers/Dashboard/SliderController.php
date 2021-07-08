<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ServiceDatatables;
use App\DataTables\SliderDatatables;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDatatables $datatables)
    {
        return $datatables->render('dashboard.sliders.index', [
            'title' => trans('site.sliders'),
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


        return view('dashboard.sliders.create');

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
            'description_ar' => 'required',
            'description_en' => 'required',

            'image' => 'required'


        ]);

        $service = Slider::create($request->except('image'));

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $service->image = $filename;
            $service->save();
        }


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.sliders.index');

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
        $slider = Slider::find($id);


        return view('dashboard.sliders.edit', compact('slider'));

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
        $service = Slider::find($id);

        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required'


        ]);

        $service->update($request->except('image'));


        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(200, 200)->save(public_path('/uploads/' . $filename));
            $service->image = $filename;
            $service->save();
        }


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Slider::find($id);
        $event->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
