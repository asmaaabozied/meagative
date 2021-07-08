<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CustomerDatatables;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\Customers_email;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerDatatables $customers)
    {
        return $customers->render('dashboard.datatable2', [
            'title' => trans('site.customers'),
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
        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        return view('dashboard.customers.create', compact('countries', 'cities'));

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
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required',
            'country_id' => 'required',
            'mobile' => 'required',
            'password' => 'required|confirmed',
            'company_name' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'photo_file' => 'required',


        ]);

        $customer = customer::create($request->except('email','photo_file','company_file','personal_file', 'password_confirmation', 'password'));
        $customer['password'] = bcrypt($request->password);

        $customers = Customers_email::updateOrCreate(['email' => $request->email],
            ['email' => $request->email, 'customer_id' => $customer->id, 'email_verified' => 0]);

        if ($request->hasFile('photo_file')) {
            $thumbnail = $request->file('photo_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->photo_file = $filename;
            $customer->save();
        }
           if ($request->hasFile('personal_file')) {
               $thumbnail = $request->file('personal_file');
               $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
               Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
               $customer->personal_file = $filename;
               $customer->save();
           }
        if ($request->hasFile('company_file')) {
            $thumbnail = $request->file('company_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->company_file = $filename;
            $customer->save();
        }

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.customers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer = customer::find($id);

        $cities = City::get()->pluck('name', 'id');

        $countries = Country::get()->pluck('name', 'id');

        return view('dashboard.customers.show', compact('customer', 'countries', 'cities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);

        $cities = City::get()->pluck('name', 'id');

        $countries = Country::get()->pluck('name', 'id');

        return view('dashboard.customers.edit', compact('customer', 'countries', 'cities'));

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
        $customer = customer::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required',
            'country_id' => 'required',
            'mobile' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'photo_file' => 'required',


        ]);

        $customer->update($request->except('photo_file', 'password_confirmation', 'password','email'));

        $customer['password'] = bcrypt($request->password);

        $customers = Customers_email::updateOrCreate(['email' => $request->email],
            ['email' => $request->email, 'customer_id' => $customer->id, 'email_verified' => 0]);

        if ($request->hasFile('photo_file')) {
            $thumbnail = $request->file('photo_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->photo_file = $filename;
            $customer->save();
        }

        if ($request->hasFile('personal_file')) {
            $thumbnail = $request->file('personal_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->personal_file = $filename;
            $customer->save();
        }
        if ($request->hasFile('company_file')) {
            $thumbnail = $request->file('company_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->company_file = $filename;
            $customer->save();
        }


        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {
        $info = customer::find($id);

        $status = ($info->status == 0) ? 1 : 0;
        $info->status = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();

        //Revoke User With Status =0;


    }//end of update

}
