<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard') ;

    }        /* user managment*/

    public function users()
    {
        $users =User::orderBy('name','asc')->get();

        return view('admin.Viewuser',compact('users')) ;

    }

    public function  Create_user()
    {
        return view('admin.Createuser') ;
    }
    public function  add_user(request $request)
    {

        $data=new user;


        $data->name=$request->name;
        $data->email=$request->email;
        $data->usertype=$request->usertype;
        $data->phone=$request->phone;
        $data->position=$request->position;
        $data->address=$request->address;
        $data->Nice=$request->Nice;
        $data->Gender=$request->Gender;
        $data->password=Hash::make($request->password);

        $data->save();

        return redirect()->back();
    }
    public function deleteuser($id)
        {
             $data=user::find($id);
             $data->delete();

             return redirect()->back();

        }





    /* Stock managmnet*/














}
