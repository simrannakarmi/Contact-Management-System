<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        $user = Auth::user();
		$contact = Contact::where('user_id', $user->id)->get();
		return view('contacts.index', compact('contact'));
        //return view('home',['contact'=> Contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('contacts.create',compact('users'));
        //return view('contacts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST
        $validated = $request->validate([

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'user_id'=>'required'
        ]);

        $contact = new Contact();

        //$contact->id = strip_tags($request->input('id'));
        $contact->first_name = strip_tags($request->input('first_name'));
        $contact->last_name = strip_tags($request->input('last_name'));
        $contact->email = strip_tags($request->input('email'));
        $contact->phone = strip_tags($request->input('phone'));
        $contact->address = strip_tags($request->input('address'));
        $contact->user_id = strip_tags($request->input('user_id'));

        $contact->save();

        return redirect()->route('home')->with('success','Contact Saved!!');

        //return back()->with('success', 'Thank you for contact us!');

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
        //
        $contact = Contact::find($id);
        $users = User::all();
        return view('contacts.edit',compact('contact','users'));
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
        //
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

        //return back()->with('success', 'Thank you for contact us!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('home');
        //return redirect('/contacts')->with('success', 'Contact deleted!!');
    }


}
