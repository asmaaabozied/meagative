<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\EventDatatables;
use App\Http\Controllers\Controller;

use App\Models\customer;
use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventDatatables $eventDatatables)
    {
        return $eventDatatables->render('dashboard.datatable', [
            'title' => trans('site.events'),
            'count'=> $eventDatatables->count()
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

        return view('dashboard.events.create',compact('customers'));

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



        ]);

        $event = Event::create($request->except('image'));


        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(200, 200)->save(public_path('/uploads/' . $filename));
            $event->image = $filename;
            $event->save();
        }

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        $customers = customer::get()->pluck('name', 'id');



        return view('dashboard.events.show', compact( 'event','customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.events.edit', compact( 'event','customers'));

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
        $event = Event::find($id);

        $request->validate([
            'name_ar' => 'required',
            'description_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);

        $event->update($request->except('image'));

        if ($request->hasFile('image')) {
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(200, 200)->save(public_path('/uploads/' . $filename));
            $event->image = $filename;
            $event->save();
        }


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Event::find($id);

        $status = ($info->active == 0) ? 1 : 0;
        $info->active = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
