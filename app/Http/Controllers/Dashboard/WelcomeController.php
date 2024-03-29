<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Consultation;
use App\Lawercase;
use App\Models\customer;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\Venue;
use App\User;

// use App\Supplier;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class WelcomeController extends Controller
{
    public function index()
    {

//        if (auth()->user()->hasRole(['admin', 'super_admin'])) {
        $stadium = 0;
        $users = customer::count();
        $services = Service::count();
        $halls = Venue::count();
        $inquires=Inquiry::count();


        return view('dashboard.welcome', compact('users', 'services', 'halls','inquires'));

    }
}//end of controller
