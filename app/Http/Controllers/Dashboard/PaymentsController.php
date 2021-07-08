<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CatogeryDatatables;
use App\DataTables\PaymentDatatables;
use App\Http\Controllers\Controller;


use App\Models\Category;
use App\Models\customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentDatatables $datatables)
    {

        return $datatables->render('dashboard.payments.index', [
            'title' => trans('site.payments'),
            'count'=> $datatables->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=customer::get()->pluck('name','id');

        return view('dashboard.payments.create',compact('customers'));

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
            'payment_type' => 'required',
            'customer_id' => 'required',
            'payment_id' => 'required',
            'datetime' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'payment_brand' => 'required',
            'card_number' => 'required',

            'notes' => 'required',

        ]);

        Payment::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.paymentss.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);

        $customers=customer::get()->pluck('name','id');


        return view('dashboard.payments.show', compact('payment','customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        $customers=customer::get()->pluck('name','id');

        return view('dashboard.payments.edit', compact('payment','customers'));

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
        $payment = Payment::find($id);

        $request->validate([
            'payment_type' => 'required',
            'customer_id' => 'required',
            'payment_id' => 'required',
            'datetime' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'payment_brand' => 'required',
            'card_number' => 'required',

            'notes' => 'required',

        ]);


        $payment->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.paymentss.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Payment::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }



}
