<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

use App\Models\Booking;
use App\Models\customer;
use App\Models\Event;
use App\Models\Typevenue;
use App\Models\Venue;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;

class VenuesController extends Controller
{

    public function index()
    {
        $venues = Venue::paginate(6);


        $types = Typevenue::get()->pluck('name', 'id');


        return view('frontend.searchvenues', compact('venues', 'types'));

    }

    public function show($id)
    {
        $venue = Venue::find($id);

        $ratigs = $venue->venueratings()->paginate(6);

        return view('frontend.detailvenues', compact('venue', 'ratigs'));


    }

    public function favouritevenues($id)
    {

        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;
        $customers = customer::find($customer_id);


        $customers->venues()->toggle($id);

        return back();


    }

    public function detailbookvenues($id)
    {

        $booking = Booking::where('venue_id', $id)->first();

        if ($booking) {
            $booking = Booking::where('venue_id', $id)->first();


        } else {

            $booking = '';
        }

        return view('frontend.detailsvenues', compact('booking'));
    }

    public function create()
    {


    }

    public function store(Request $request)
    {
        $types = Typevenue::get()->pluck('name', 'id');

        $venues = Venue::with(['venueratings' => function ($q) use ($request) {
            $q->where('rate', '<=', $request->rating);

        }])->where('venue_type_id', $request->venue_type_id)
            ->whereBetween('price', [$request->price1, $request->price2])
            ->where('capacity', $request->capacity)->paginate(6);

        return view('frontend.searchvenues', compact('venues', 'types'));


//    return $venues;

    }


}
