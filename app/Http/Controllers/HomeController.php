<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;
use App\Models\Country;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Venue;
use App\User;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Laravel\Firebase\Facades\Firebase;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth')->except(['loginProvider']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        if (auth()->user()->hasRole(['admin', 'super_admin'])) {
        return redirect(route('dashboard.welcome'));
//        }
//        return view('home');
    }

    public function website()
    {
        $services = Service::latest()->paginate(6);

        $sliders = Slider::latest()->get();

        $countries = Country::get()->pluck('name', 'id');

        return view('frontend.index', compact('services', 'sliders', 'countries'));
    }


    public function googlemap()
    {
      return view('frontend.google');

    }


    public function sendPosition(Request $request)
    {

        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $miles = $latitude - $longitude;

        $result = DB::select(DB::raw("select id,name_ar,name_en, description_ar,description_en,price,address_ar,address_en,image,latitude,longitude,
                                            ( 3959 * acos( cos( radians('$latitude') ) *
                                            cos( radians( latitude ) ) *
                                            cos( radians( longitude ) -
                                            radians('$longitude') ) +
                                            sin( radians('$latitude') ) *
                                            sin( radians( latitude ) ) ) )
                                            AS distance FROM venues WHERE latitude > 0 and longitude > 0 and active='1'
                                            and ( 3959 * acos( cos( radians('$latitude') ) *
                                            cos( radians( latitude ) ) *
                                            cos( radians( longitude ) -
                                            radians('$longitude') ) +
                                            sin( radians('$latitude') ) *
                                            sin( radians( latitude ) ) ) )"));
        return response()->json(['success' => 'success', 'data' => $result]);
    }
}
