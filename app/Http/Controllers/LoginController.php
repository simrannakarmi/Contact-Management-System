<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{


    // public function logout()
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('login.view');
    //     //return redirect('login');
    //     // $this->guard()->logout();
    //     // $request->session()->invalidate();
    //     // return $this->loggedOut($request) ?: redirect('/login');
    // }


}
