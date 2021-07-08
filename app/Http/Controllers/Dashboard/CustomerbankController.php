<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CustomerbankDatatables;
use App\DataTables\CustomerDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\customer;
use App\Models\Customers_bank;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CustomerbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerbankDatatables $customers)
    {
        return $customers->render('dashboard.customers_banks.index', [
            'title' => trans('site.customers_banks'),
            'count'=> $customers->count()
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

        $cities = City::get()->pluck('name', 'id');

        return view('dashboard.customers_banks.create', compact('customers', 'cities'));

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
            'customer_id' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'city_id' => 'required',
            'account_number' => 'required|min:9|integer',

            'iban' => 'required',


        ]);

        $customer = Customers_bank::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.customers_banks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customers_bank::find($id);

        $customers = customer::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        return view('dashboard.customers_banks.show', compact('customer', 'customers', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers_bank::find($id);

        $customers = customer::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        return view('dashboard.customers_banks.edit', compact('customer', 'customers', 'cities'));

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
        $customer = Customers_bank::find($id);

        $request->validate([
            'customer_id' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'city_id' => 'required',
            'account_number' => 'required|min:9|integer',

            'iban' => 'required',


        ]);

        $customer->update($request->all());


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.customers_banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers_bank::find($id);
        $customer->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
