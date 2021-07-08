<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BookingDatatables;
use App\DataTables\NotificationDatatables;
use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::get()->pluck('name', 'id');

        return view('dashboard.notifications.index', compact('customers'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NotificationDatatables $datatables)
    {
        return $datatables->render('dashboard.notifications.show', [
            'title' => trans('site.notification'),
            'count'=> $datatables->count()
        ]);

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
            'user_names' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',

        ]);

        foreach ($request->user_names as $user_email) {

            $notifications = Notification::create($request->except(['_token', 'user_names']) + ['type' => 'general',

                    'customer_ids' => $user_email
                ]);
            $title = $notifications->title;

            $content = $notifications->content;


            $user = customer::where('id', $user_email)->get()->pluck('firebase_token');

            if (count($user)) {
                $title = $title;
                $content = $content;
                $data = [
                    'type' => $notifications->type,
                ];
                $send = notifyByFirebase($title, $content, $user, $data);
                info("firebase result: " . $send);
            }


        }
        session()->flash('success', __('site.messages.send_massage_successful'));
        return back();

    }

    public function savenotifictions(Request $request)
    {


        $rules = [
//            'user_emails[]'=>'required',

        ];

        foreach ($request->user_emails as $user_email) {


            foreach (config('translatable.locales') as $locale) {

                $rules += [$locale . '.title' => ['required']];
                $rules += [$locale . '.description' => ['required']];

            }//end of for each

            $request->validate($rules);

            $notifications = Notification::create($request->except(['_token', '_method', 'user_emails']) + ['type' => 'general',


                    'user_id' => $user_email
                ]);

            $title = $notifications->title;

            $content = $notifications->description;


            $user = User::where('id', $user_email)->get()->pluck('firebase_token');


            $createdat = $notifications->created_at->diffForHumans(Carbon::now());

            if (count($user)) {
                $title = $title;
                $content = $content;
                $data = [
                    'created_at' => $createdat,
                    'type' => $notifications->type,
                ];
                $send = notifyByFirebase($title, $content, $user, $data);
                info("firebase result: " . $send);
            }


        }

        session()->flash('success', __('site.messages.send_massage_successful'));
        return redirect()->route('dashboard.welcome');


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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
