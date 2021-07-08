<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BookingDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Mailbooking;
use App\Mail\MailInvition;
use App\Models\Booking;
use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\Event;
use App\Models\Typevenue;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingDatatables $booking)
    {

        return $booking->render('dashboard.booking.index', [
            'title' => trans('site.booking'),
            'count' => $booking->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $hall = Venue::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $events = Event::get()->pluck('name', 'id');

        return view('dashboard.booking.create', compact('hall', 'customers', 'events'));

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
            'end_date' => 'required',
            'start_date' => 'required',
            'customer_id' => 'required|integer',
            'venue_id' => 'required|integer',
            'event_id' => 'required|integer',
            'guests_male' => 'required|integer',
            'guests_female' => 'required|integer',
            'description' => 'required|string',


        ]);


        $booking = Booking::create($request->all());

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.booking.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        $hall = Venue::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $events = Event::get()->pluck('name', 'id');


        return view('dashboard.booking.show', compact('booking', 'hall', 'customers', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        $hall = Venue::get()->pluck('name', 'id');

        $customers = Customer::get()->pluck('name', 'id');

        $events = Event::get()->pluck('name', 'id');


        return view('dashboard.booking.edit', compact('booking', 'hall', 'customers', 'events'));

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
        $booking = Booking::find($id);

        $request->validate([
            'end_date' => 'required',
            'start_date' => 'required',
            'customer_id' => 'required|integer',
            'venue_id' => 'required|integer',
            'event_id' => 'required|integer',
            'guests_male' => 'required|integer',
            'guests_female' => 'required|integer',
            'description' => 'required|string',


        ]);

        $booking->update($request->all());


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = Booking::find($id);

        $status = ($info->status == 0) ? 1 : 0;

        $status = ($info->status == 1) ? 2 : 1;
        $info->status = $status;

        $email=$info->customer->customeremail->first()->email ?? 'asmaaabozied907@gmail.com';
        if ($info->status == 1) {
            $data = $info;
            Mail::to($email)->send(new Mailbooking($data));
        } elseif ($info->status == 2) {

            $data = $info;
            Mail::to($email)->send(new Mailbooking($data));
        }
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
