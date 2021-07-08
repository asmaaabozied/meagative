<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CustomeremailDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\Customers_email;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CustomeremailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomeremailDatatables $customers)
    {
        return $customers->render('dashboard.customers_emails.index', [
            'title' => trans('site.customers_emails'),
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


        return view('dashboard.customers_emails.create', compact('customers'));

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
            'email' => 'required',
            'customer_id' => 'required',

        ]);

        $customer = Customers_email::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.customers_emails.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers_email::find($id);

        $customers = customer::get()->pluck('name', 'id');


        return view('dashboard.customers_emails.edit', compact('customer', 'customers'));

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
        $customer = Customers_email::find($id);

        $request->validate([
            'email' => 'required',
            'customer_id' => 'required',

        ]);

        $customer->update($request->all());


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.customers_emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers_email::find($id);
        $customer->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}//end of update


