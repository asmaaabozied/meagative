<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;
use App\Mail\MailInvition;
use App\Models\Booking;
use App\Models\Messages_replie;
use App\Models\Venues_rating;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Kreait\Laravel\Firebase\Facades\Firebase;

class BookingController extends Controller
{

    public function index()
    {
        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;

        $bookingincomings = Booking::where('customer_id', $customer_id)->latest()->paginate(5);


        $bookingoutbounds = Booking::latest()->paginate(5);;


        return view('frontend.bookings', compact('bookingincomings', 'bookingoutbounds'));

    }

    public function show($id)
    {
        $booking = Booking::find($id);


        return view('frontend.detailsbooking', compact('booking'));

    }

    public function update(Request $request, $id)
    {

        $booking = Booking::find($id);

        $booking->update($request->except('_token', '_method'));

        $booking->save();

        return back();

    }

    public function invite()
    {
        return view('frontend.invite');


    }

    public function message()
    {
        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;

        $messages = Messages_replie::where('customer_id', $customer_id)->get();

        return view('frontend.message', compact('messages'));


    }

    public function Addmessage(Request $request)
    {
        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;
        $content = $request->contents;

        Messages_replie::create([
            'content' => $content,
            'customer_id' => $customer_id
        ]);

        return back();

    }

    public function points()
    {

        return view('frontend.points');


    }

    public function invitsend(Request $request)
    {


        $data = $request;

        Mail::to($request->email)->send(new MailInvition($data));

        return back();
    }


    public function addreview(Request $request)
    {
        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;

        Venues_rating::create([
            'venue_id' => $request->venue_id,
            'rate' => $request->rating,
            'description' => $request->description,
            'customer_id' => $customer_id
        ]);

        return back();
    }

}
