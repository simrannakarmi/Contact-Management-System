<?php

namespace App\Http\Controllers;

use App\Mail\RegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Contact;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $userStore = new User();
        $userStore->name = strip_tags($request->input('name'));
        $userStore->email = strip_tags($request->input('email'));
        $userStore->password = strip_tags(bcrypt($request->input('password')));
        $userStore->save();//to add record in database
        //Mail::to($userStore->email)->send(new RegisterNotification());
        return redirect()->route('login.view')->with('success','Account Created Successfully!');
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
    }

    public function signup(){
        return view('signup');
    }

    public function login(){
        return view('login');
    }

    public function loggedin(Request $request){

        $validated = $request->validate([

            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials = ($request->except('_token'));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success','You are logged in.');
        }
        else{
            return redirect()->route('login.view')->with('Incorrect Email or Password.');
        }
    }


    public function logout(Request $request){
        //Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        Session::flush();
        auth()->logout();
        return redirect()->route('login.view');
        //return redirect()->route('login.view');
    }


    public function home(){
         //dd(Auth::user());
        $user = User::find(auth()->user()->id);
        $contact = Contact::all();

        return view('home',compact('contact','user'));
    }


}
