<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

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

}
