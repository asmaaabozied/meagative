<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ServiceDatatables;
use App\DataTables\SliderDatatables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\customer;
use App\Models\Customers_login;
use App\Models\Planner;
use App\Models\Service;
use App\Models\Typevenue;
use Illuminate\Support\Carbon;
use App\Models\Venue;
use Intervention\Image\Facades\Image;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{


    public function reportvenues()
    {

        $halls = Venue::whereNotNull('views')->get();

        $countries = Country::get()->pluck('name', 'id');

        $customers = customer::get()->pluck('name', 'id');

        $types = Typevenue::get()->pluck('name', 'id');

        return view('dashboard.reports.reportvenues', compact('halls', 'countries', 'customers', 'types'));


    }


    public function searchreportvenues(Request $request)
    {

        $start = Carbon::parse($request->get('date1'))->format('Y-m-d');

        $end = Carbon::parse($request->get('date2'))->format('Y-m-d');

        if (!empty($start) && !empty($end) && !empty($request->price) && !empty($request->country_id) && !empty($request->customer_id) && !empty($request->venue_type_id)) {

            $halls = Venue::whereBetween('created_at', [$start, $end])
                ->where('price', $request->price)
                ->where('country_id', $request->country_id)
                ->where('venue_type_id', $request->venue_type_id)->where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($start) && !empty($end)) {

            $halls = Venue::whereBetween('created_at', [$start, $end])
                ->whereNotNull('views')->get();

        } elseif (!empty($start)) {

            $halls = Venue::where('created_at', $start)->whereNotNull('views')->get();

        } elseif (!empty($end)) {

            $halls = Venue::where('created_at', $end)->whereNotNull('views')->get();

        } elseif (!empty($request->price)) {

            $halls = Venue::where('price', $request->price)->whereNotNull('views')->get();

        } elseif (!empty($request->country_id)) {

            $halls = Venue::where('country_id', $request->country_id)->whereNotNull('views')->get();

        } elseif (!empty($request->customer_id)) {

            $halls = Venue::where('customer_id', $request->customer_id)->whereNotNull('views')->get();

        } elseif (!empty($request->venue_type_id)) {

            $halls = Venue::where('venue_type_id', $request->venue_type_id)->whereNotNull('views')->get();

        } elseif (!empty($request->country_id) && !empty($request->price)) {

            $halls = Venue::where('price', $request->price)->where('country_id', $request->country_id)->whereNotNull('views')->get();


        } elseif (!empty($request->customer_id) && !empty($request->price)) {

            $halls = Venue::where('price', $request->price)->where('customer_id', $request->customer_id)->whereNotNull('views')->get();


        } elseif (!empty($request->customer_id) && !empty($request->price) && !empty($request->country_id)) {

            $halls = Venue::where('price', $request->price)
                ->where('customer_id', $request->customer_id)
                ->where('country_id', $request->country_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->customer_id)) {

            $halls = Venue::where('customer_id', $request->customer_id)->where('country_id', $request->country_id)->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->venue_type_id)) {

            $halls = Venue::where('venue_type_id', $request->venue_type_id)->where('country_id', $request->country_id)->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->customer_id)) {

            $halls = Venue::where('customer_id', $request->customer_id)->where('country_id', $request->country_id)->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->customer_id) && !empty($request->venue_type_id)) {

            $halls = Venue::where('customer_id', $request->customer_id)
                ->where('country_id', $request->country_id)
                ->where('venue_type_id', $request->venue_type_id)
                ->whereNotNull('views')->get();


        } else {
            $halls = Venue:: whereNotNull('views')->get();

        }

        return view('dashboard.reports.searchvenues', compact('halls'));


    }

    public function reportplanners()
    {

        $planers = Planner::whereNotNull('views')->get();

        $countries = Country::get()->pluck('name', 'id');

        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.reports.reportplaners', compact('planers', 'countries', 'customers'));
    }


    public function searchreportplanners(Request $request)
    {

        $start = Carbon::parse($request->get('date1'))->format('Y-m-d');
        $end = Carbon::parse($request->get('date2'))->format('Y-m-d');

        if (!empty($start) && !empty($end) && !empty($request->email) && !empty($request->phone) && !empty($request->country_id) && !empty($request->customer_id)) {

            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('email', $request->email)->where('phone', $request->phone)
                ->where('country_id', $request->country_id)->where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->email)) {
            $planers = Planner::where('email', $request->email)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->email) && !empty($request->status)) {
            $planers = Planner::where('email', $request->email)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->phone)) {
            $planers = Planner::where('phone', $request->phone)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->phone) && !empty($request->status)) {
            $planers = Planner::where('phone', $request->phone)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->country_id)) {
            $planers = Planner::where('country_id', $request->country_id)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->country_id) && !empty($request->status)) {
            $planers = Planner::where('country_id', $request->country_id)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->customer_id)) {
            $planers = Planner::where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->customer_id) && !empty($request->status)) {
            $planers = Planner::where('customer_id', $request->customer_id)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->email) && !empty($request->phone) && !empty($request->country_id)) {
            $planers = Planner::where('email', $request->email)
                ->where('phone', $request->phone)
                ->where('country_id', $request->country_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->email) && !empty($request->phone) && !empty($request->country_id) && !empty($request->customer_id)) {
            $planers = Planner::where('email', $request->email)
                ->where('phone', $request->phone)
                ->where('country_id', $request->country_id)
                ->where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->email) && !empty($request->phone)) {
            $planers = Planner::where('email', $request->email)
                ->where('phone', $request->phone)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->phone)) {
            $planers = Planner::where('country_id', $request->country_id)
                ->where('phone', $request->phone)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->customer_id)) {
            $planers = Planner::where('country_id', $request->country_id)
                ->where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();


        } elseif (!empty($request->country_id) && !empty($request->email)) {
            $planers = Planner::where('country_id', $request->country_id)
                ->where('email', $request->email)
                ->whereNotNull('views')->get();


        } elseif (!empty($start)) {

            $planers = Planner::where('created_at', $start)->whereNotNull('views')->get();

        } elseif (!empty($end)) {
            $planers = Planner::where('created_at', $end)->whereNotNull('views')->get();

        } elseif (!empty($request->status)) {

            $planers = Planner::where('active', $request->status)->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->status)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->email)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('email', $request->email)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->email) && !empty($request->status)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('email', $request->email)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->phone) && !empty($request->status)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('phone', $request->phone)
                ->where('active', $request->status)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->phone)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('phone', $request->phone)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->phone) && !empty($request->email)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('phone', $request->phone)
                ->where('email', $request->email)
                ->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->phone) && !empty($request->email) && !empty($request->status)) {
            $planers = Planner::whereBetween('created_at', [$start, $end])
                ->where('phone', $request->phone)
                ->where('active', $request->status)
                ->where('email', $request->email)
                ->whereNotNull('views')->get();

        } else {
            $planers = Planner::whereNotNull('views')->get();

        }

        return view('dashboard.reports.searchplaners', compact('planers'));

    }

    public function reportservice()
    {

        $services = Service::whereNotNull('views')->get();
        $catogeries = Category::get()->pluck('name', 'id');
        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.reports.reportservices', compact('services', 'catogeries', 'customers'));

    }

    public function searchreportservice(Request $request)
    {
        $start = Carbon::parse($request->get('date1'))->format('Y-m-d');
        $end = Carbon::parse($request->get('date2'))->format('Y-m-d');

        if (!empty($request->category_id)) {

            $services = Service::where('category_id', $request->category_id)->whereNotNull('views')->get();


        } elseif (!empty($request->customer_id)) {

            $services = Service::where('customer_id', $request->customer_id)->whereNotNull('views')->get();


        } elseif (!empty($request->status) && !empty($request->category_id) && !empty($request->customer_id) && !empty($start) && !empty($end)) {
            $services = Service::where('active', $request->status)
                ->whereBetween('created_at', [$start, $end])
                ->where('category_id', $request->category_id)
                ->where('customer_id', $request->customer_id)
                ->whereNotNull('views')->get();

        } elseif (!empty($request->status)) {

            $services = Service::where('active', $request->status)
                ->whereNotNull('views')->get();
        } elseif (!empty($start) && !empty($end)) {

            $services = Service::whereBetween('created_at', [$start, $end])->whereNotNull('views')->get();


        } elseif (!empty($start)) {

            $services = Service::where('created_at', $start)->whereNotNull('views')->get();

        } elseif (!empty($end)) {

            $services = Service::where('created_at', $end)->whereNotNull('views')->get();

        } elseif (!empty($start) && !empty($end) && !empty($request->category_id) && !empty($request->customer_id)) {

            $services = Service::whereBetween('created_at', [$start, $end])->whereNotNull('views')->get();


        }
        return view('dashboard.reports.searchservices', compact('services'));
    }

    public function reportcustomers()
    {

        $customers = Customers_login::get();

        $customerss = customer::get()->pluck('name', 'id');


        return view('dashboard.reports.reportcustomers', compact('customers', 'customerss'));

    }

    public function searchreportcustomers(Request $request)
    {

        $start = Carbon::parse($request->get('date1'))->format('Y-m-d');

        $end = Carbon::parse($request->get('date2'))->format('Y-m-d');


        if (!empty($request->customer_id)) {

            $customers = Customers_login::where('customer_id', $request->customer_id)->get();


        } elseif (empty($start) && empty($end) && empty($request->customer_id)) {

            $customers = Customers_login::get();
        } elseif (!empty($start) && !empty($end)) {

            $customers = Customers_login::whereBetween('created_at', [$start, $end])->get();

        } elseif (!empty($start)) {

            $customers = Customers_login::where('created_at', $start)->get();

        } elseif (!empty($end)) {

            $customers = Customers_login::where('created_at', $end)->get();

        }


        return view('dashboard.reports.searchcustomers', compact('customers'));


    }


}
