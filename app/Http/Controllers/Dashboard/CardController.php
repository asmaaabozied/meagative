<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CountryDatatables;
use App\Http\Controllers\Controller;

use App\Models\Card;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDatatables $countries)
    {


        return $countries->render('dashboard.datatable', [
            'title' => trans('site.countries'),
            'count'=> $countries->count()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citizens=Citizen::all();
        return view('dashboard.cards.create',compact('citizens'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Card::create($request->all());


        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.cards.index');

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
        $card= Card::find($id);
        $citizens=Citizen::all();
        return view('dashboard.cards.edit', compact('card','citizens'));

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
        $card= Card::find($id);


        $card->update($request->all());

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card= Card::find($id);
        $card->delete();
        session()->flash('success', __('site.deleted_successfully'));

        return back();
    }


}
