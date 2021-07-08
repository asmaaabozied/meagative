<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContactDatatables;
use App\DataTables\UserDatatables;
use App\Models\Contact_u;
use App\User;
use App\Role;
use Illuminate\Support\Str;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;

// define('Paginate_number',10);
// define('User_image_path','uploads/user_images/');

class ContactController extends Controller
{
    public function __construct()
    {


    }//end of constructor

    public function index(ContactDatatables $userDatatables)
    {

        return $userDatatables->render('dashboard.contacts.index', [
            'title' => trans('site.contact'),
            'count'=> $userDatatables->count()
        ]);


    }//end of index


    public function destroy($id)
    {
        $contact = Contact_u::find($id);
        $contact->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }//end of destroy



}//end of controller
