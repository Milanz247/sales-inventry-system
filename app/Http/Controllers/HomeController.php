<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // manage user roles

    public function Login()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
             return view('admin.dashboard');
        }
        if($usertype=='2')
        {
             return view('cashier');
        }
        else
        {
            return view('home');
        }
    }


}
