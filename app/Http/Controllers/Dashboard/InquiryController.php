<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\InquryDatatables;
use App\Http\Controllers\Controller;

use App\Mail\Mailbooking;
use App\Mail\mailinquery;
use App\Models\Inquiry;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InquryDatatables $datatables)
    {
        return $datatables->render('dashboard.inquiries.index', [
            'title' => trans('site.inquiries'),
            'count' => $datatables->count()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.inquiries.create');

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
            'name_ar' => 'required',
            'name_en' => 'required',


        ]);

        Inquiry::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.inquiries.index');

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
        $Inquiry = Inquiry::find($id);


        return view('dashboard.inquiries.edit', compact('Inquiry'));

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
        $type = Inquiry::find($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',


        ]);


        $type->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.inquiries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Inquiry::find($id);

        $type->delete();

        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }

    public function block($id)
    {

        $info = Inquiry::find($id);

        $status = ($info->status == 1) ? 1 : 2;
        $status = ($info->status == 0) ? 0 : 1;


        $status = ($info->status == 3) ? 1 : 2;
        $status = ($info->status == 2) ? 1 : 2;
        $email = $info->customer->customeremail->first()->email ?? 'asmaaabozied907@gmail.com';


        if ($info->status == 1) {

            $data = $info;
            Mail::to($email)->send(new mailinquery($data));

        } elseif ($info->status == 2) {
            $data = $info;
            Mail::to($email)->send(new mailinquery($data));

        }

        elseif ($info->status == 3){
            $data = $info;
            Mail::to($email)->send(new mailinquery($data));

        }
        $info->status = $status;
        $info->save();
        session()->flash('success', __('site.updated_successfully'));
        return back();


    }//end of update

}
