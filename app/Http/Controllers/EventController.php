<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

use App\Models\Event;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::paginate(6);

        return view('frontend.searchevent',compact('events'));

    }


}
