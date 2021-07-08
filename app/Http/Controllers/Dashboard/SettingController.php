<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Setting::where('group_name','contacts')->get();

        return view('dashboard.settings.index', compact('settings'));

    }


    public function updateAll(Request $request){


//        $request->validate([
//            'Facebook' => 'required|string',
//            'Email' => 'required|email|string',
//            'Phone' => 'required|string',
//            'Twitter' => 'required',
////            'youtube'  => 'required|string',
//            'Instegram'=>'required'
//
//        ]);



        $data=$request->except('_token');
        foreach ($data as $key=>$value){
            $tmp =Setting::where('group_name','contacts')->where('name',$key)->first();
            $setting = Setting::where('id',$tmp['id'])->first();
            $setting->value=$value;
            $setting->save();
        }
        session()->flash('success', __('site.updated_successfully'));


        return redirect()->back();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


}
