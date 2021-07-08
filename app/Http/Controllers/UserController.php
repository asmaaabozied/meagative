<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateRequest;
use App\Mail\MailEmail;
use App\Mail\Mailupdatedpassword;
use App\Models\City;
use App\Models\Country;
use App\Models\customer;
use App\Models\Customer_Venue;
use App\Models\Customers_email;
use App\Models\Event;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Kreait\Laravel\Firebase\Facades\Firebase;

use Validator;

class UserController extends Controller
{

    public function loginpassword(Request $request)
    {
//        $password = bcrypt($request->password);


        $validation = Validator::make($request->all(), [
            'password' => 'required',


        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }


        if (Auth::guard('customer')->attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
            $user = Auth::guard('customer')->user();
            return response()->json(['status' => true, 'content' => 'successlogin', 'data' => $user]);


        }

    }

    public function signup(Request $request)
    {
        $country = Country::where('id', $request->country_id)->select(['mobile_ex', 'call_key'])->first();
        $phone_len = strlen($country->mobile_ex);


        $validation = Validator::make($request->all(), [

            'country_id' => 'required',
            'mobile' => 'required|digits:' . $phone_len,

        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $customer = customer::where('mobile', $request->mobile)->first();

        $email = '';
        if($customer) {
            if ($customer->mobile_verified == 1) {
                $email = $customer->customeremail()->first()->email ?? '';

                return response()->json(['status' => true, 'content' => 'password', 'data' => $customer->mobile]);

            } elseif ($customer->mobile_verified == 0) {


                //send code

                $code = rand(1111, 9999);

                $cust = customer::update(['mobile' => $request->mobile, 'mobile_verification_code' => $code]);
// send code to mobile
                Mail::to('asmaaabozied907@gmail.com')->send(new MailEmail($code));

                return response()->json(['status' => true, 'content' => 'verifycodephone', 'data' => ['mobile' => $request->mobile]]);

            }


        }else{

            //send code

            $code = rand(1111, 9999);

            $cust = customer::updateOrCreate(['mobile' => $request->mobile], ['mobile' => $request->mobile, 'mobile_verification_code' => $code]);
// send code to mobile
            Mail::to('asmaaabozied907@gmail.com')->send(new MailEmail($code));

            return response()->json(['status' => true, 'content' => 'verifycodephone', 'data' => ['mobile' => $request->mobile]]);


        }



    }

    public function selectcountry()
    {
        $validation = Validator::make(request()->all(), [

            'country_id' => 'required',

        ]);
        return Country::where('id', request()->country_id)->select(['call_key'])->first() ?? 'error';

    }

    public function verifycodephone(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'code' => 'required|exists:customers,mobile_verification_code',
            'phone' => 'required',

        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $code = $request->code;
        $phone = $request->phone;
        $customer = customer::where('mobile', $phone)->where('mobile_verification_code', $code)->first();
        if ($customer) {
            $customer->mobile_verified=1;
            $customer->mobile_verification_code = null;
            $customer->save();

            return response()->json(['status' => true, 'content' => 'register', 'data' => ['mobile' => $phone,'type'=>'phone']]);


        }


    }

    public function verifycode(Request $request)
    {

        $validation = Validator::make($request->all(), [

            'code' => 'required|exists:customers_emails,email_verification_code',

            'email' => 'required',

        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }
        $code = $request->code;
        $email = $request->email;

        $customer = Customers_email::where('email', $email)->where('email_verification_code', $code)->first();


        if ($customer) {

//            $cust = Customers_email::where('email', $email)->where('email_verification_code', $code)->first();


            $customer->update(['email_verified', 1]);

            if ($customer->customer_id) {

                return response()->json(['status' => true, 'content' => 'password']);


            } else {

                return response()->json(['status' => true, 'content' => 'register', 'data' => $email]);


            }


        } else {
            return response()->json(['status' => true, 'content' => 'codeerror']);


        }


    }

    public function registercustomers(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'birth_date' => 'required',
//            'email' => 'required|email|unique:customers_emails',
            'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }


        $customer = customer::create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->phone,
            'name' => $request->first_name . $request->last_name,
            'birth_date' => $request->birth_date,
            'password' => bcrypt($request->password),


        ]);


        $customers = Customers_email::updateOrCreate(['email' => $request->email, 'email_verified' => 1],
            ['email' => $request->email, 'customer_id' => $customer->id, 'email_verified' => 1]);


        if ($customers) {
            return response()->json(['status' => true, 'content' => 'passwordss', 'data' => $customer->mobile]);


        }


    }

    public function loginemail(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'max:254|email|required',

        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $customer = Customers_email::updateOrCreate(['email' => $request->email], ['email' => $request->email]);
        $cust = Customers_email::find($customer->id);
        if ($cust->email_verified == 0) {

            $code = rand(1111, 9999);

            $update = $cust->update(['email_verification_code' => $code]);

            Mail::to($cust->email)->send(new MailEmail($code));

            return response()->json(['status' => true, 'content' => 'verify', 'data' => $cust->email]);


        } elseif ($cust->email_verified == 1) {

            if (!empty($cust->customer_id)) {

                return response()->json(['status' => true, 'content' => 'password']);


            } else {

                return response()->json(['status' => true, 'content' => 'register', 'data' => $cust->email]);


            }


        }
//        return $cust;
    }


    public function show()
    {
        $customer = customer::find(Auth::guard('customer')->loginUsingId(1)->id);

        $countries = Country::get()->pluck('name', 'id');

        $cities = City::get()->pluck('name', 'id');

        return view('frontend.showprofile', compact('customer', 'countries', 'cities'));

    }

    public function update($id, Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'mobile' => 'required|min:9',

            'country_id' => 'required',
            'city_id' => 'required',
            'address' => 'required|min:9',


        ]);

        $customer = customer::find($id);

        $customer->update($request->except('photo_file', '_token', '_method', 'email'));

        $cust = Customers_email::where('customer_id', $id)->first();

        $cust->email = $request->email;
        $cust->save();

        if ($request->hasFile('photo_file')) {
            $thumbnail = $request->file('photo_file');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(100, 100)->save(public_path('/uploads/' . $filename));
            $customer->photo_file = $filename;
            $customer->save();
        }

        session()->flash('success', __('site.updated_successfully'));

        return back();


    }

    public function updateprivacy($id, UpdateRequest $request)
    {


        $customer = customer::find($id);

        $customer['password'] = bcrypt($request->newpassword);

        $customer->save();

        session()->flash('success', __('site.Password update1'));

        $email = $customer->customeremail->first()->email ? $customer->customeremail->first()->email : 'asmaaabozied907@gmail.com';

        Mail::to($email)->send(new Mailupdatedpassword($customer));

        return back();

    }

    public function account()
    {

        return view('frontend.account');


    }

    public function privacy()
    {

        return view('frontend.privacy');

    }

    public function favouritevenues()
    {
        $customer_id = Auth::guard('customer')->loginUsingId(1)->id;

//        $customers = Customer_Venue::where('customer_id', $customer_id)->get();
        $customers = customer::find($customer_id);
//return $customers->venues;


        return view('frontend.favouritevenues', compact('customers'));


    }


}
