<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request -> search == "") {
        //     $data = User::orderBy('id','DESC')->paginate(5);
        //     $roles = Role::pluck('name','name')->all();
        //     return view('users.index',compact('data','roles'))
        //     ->with('i',($request->input('page',1) - 1) * 5);
        // }
        // else
        // {
        //     $data = User::where('name', 'LIKE', '%' .$request->search, '%'
        //     )->paginate(5);
        //     $roles = Role::pluck('name','name')->all();
        //     $data->appends($request->only('users.index'));
        //     return view('users.index',compact('data','roles'))
        //     ->with('i',($request->input('page',1) - 1) * 5);
        // }
        $user = Auth::User();
		$contact = Contact::where('user_id', $user->id)->get();
		return view('admin.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $users = User::all();
        return view('admin.edit',compact('contact','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $contact = new Contact();
        $contact = Contact::find($id);
        $contact->first_name = strip_tags($request->get('first_name'));
        $contact->last_name = strip_tags($request->get('last_name'));
        $contact->email = strip_tags($request->get('email'));
        $contact->phone = strip_tags($request->get('phone'));
        $contact->address = strip_tags($request->get('address'));


        $contact->save();
        return redirect()->route('home')->with('success','Contact Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('home');
    }
}
