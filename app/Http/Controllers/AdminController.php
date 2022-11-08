<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\catagory;
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

        return redirect()->back()->with('message','User added successfuly');
    }
    public function deleteuser($id)
        {
             $data=user::find($id);
             $data->delete();

             return redirect()->back()->with('message','User Deleted  successfuly');

        }
        public function  user_serach(request $request)
        {
            $search_text=$request->search;

            $users =user::where('name','LIKE',"%$search_text%")->orwhere('position','LIKE',"%$search_text%")->get();

            return view('admin.viewuser',compact('users'));
        }

                      /* Stock managmnet*/

        public function  view_catagory()
        {
            $data =catagory::orderBy('catagory_name','asc')->get();

            return view('admin.catagory',compact('data')) ;
        }



        public function  add_catagory(request $request)
        {
            $data=new catagory;

            $data->catagory_name=$request->catagory;

            $data->save();

            return redirect()->back()->with('message','catagory added successfuly');


        }
        public function delete_catagory($id)
        {
             $data=catagory::find($id);
             $data->delete();

             return redirect()->back()->with('message','Catagory Deleted successfuly');

        }

        public function view_item()
        {
            return view('admin.item');
        }























}
