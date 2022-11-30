<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\catagory;
use App\Models\items;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use App\Models\billitemtempory;
use App\Models\invoicehistory;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

              //  dashboard
    public function admin_dashboard()
    {
        return view('admin.admin-dashboard') ;

    }

                    //  user managment function

    public function view_admin_users()
    {
        $users =User::orderBy('name','asc')->get();

        return view('admin.admin-view-users',compact('users')) ;

    }

    // add user function

    public function   add_new_user_form()
    {
        return view('admin.admin-add-new-user-form') ;
    }

    public function   save_user_to_database(request $request)
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

        // delete user function
    public function delete_user($id)
        {
             $data=user::find($id);
             $data->delete();

             return redirect()->back()->with('message','User Deleted  successfuly');
        }


            // update user function

        public function update_user_form($id)
        {
            $data=user::find($id);
            return view ('admin.admin-update-user-form',compact('data'));
        }
        public function update_user_save(request $request,$id)
        {
            $data=user::find($id);

            $data->name=$request->name;
            $data->email=$request->email;
            $data->usertype=$request->usertype;
            $data->phone=$request->phone;
            $data->position=$request->position;
            $data->address=$request->address;
            $data->Nice=$request->Nice;
            $data->Gender=$request->Gender;

            $data->save();

            return redirect('view-users')->with('message','Updated successfuly');

        }

            // search user function

        public function  search_user(request $request)
        {
            $search_text=$request->search;
            $users =user::where('name','LIKE',"%$search_text%")->orwhere('position','LIKE',"%$search_text%")->get();
            return view('admin.admin-view-users',compact('users'));

        }

                            //  stock managment function
        // catagory part

        public function  admin_view_catagory()
        {
            $data =catagory::orderBy('catagory_name','asc')->get();
            return view('admin.admin-catagory',compact('data')) ;
        }
        public function  admin_add_catagory(request $request)
        {
            $data=new catagory;
            $data->catagory_name=$request->catagory;
            $data->save();

            return redirect()->back()->with('message','catagory added successfuly');


        }
        public function admin_delete_catagory($id)
        {
             $data=catagory::find($id);
             $data->delete();

             return redirect()->back()->with('message','Catagory Deleted successfuly');

        }


        // item functions
        public function admin_view_items()
        {
            $items = items::all();
            return view('admin.admin-view-items',compact('items'));

        }
        public function  admin_delete_items($id)
        {
            $data=items::find($id);
            $data->delete();

            return redirect()->back()->with('message','item Deleted successfuly');
        }
        public function admin_view_add_new_item_form()
        {
            $catagory = catagory::all();
            return view('admin.admin-add-new-items-form',compact('catagory'));
        }
        public function admin_add_item_to_database(request $request)
        {
            $items=new items;
            $items->item_Code=$request->itemid;
            $items->item_name=$request->itemname;
            $items->item_description=$request->itemdescription;
            // $items->Buying_price=$request->buyingprice;
            // $items->Selling_price=$request->sellingprice;
            // $items->warranty=$request->warranty;
            // $items->quantity=$request->quantity;
            $items->catagory_id=$request->catagory;
            $items->save();

            return redirect()->back()->with('message','Item added successfuly');
        }
        public function admin_view_update_form($id)
        {
            $data=items::find($id);
            $catagory = catagory::all();
            return  view('admin.admin-update-item-form',compact('catagory'),compact('data'));
        }
        public function admin_update_item_save_database(request $request,$id)
        {
            $data=items::find($id);

            $data->item_Code=$request->itemcode;
            $data->item_name=$request->itemname;
            $data->item_description=$request-> itemdescription;
            $data->catagory_id=$request->catagory;
            $data->save();

            return redirect('admin-view-items')->with('message','Updated successfuly');
        }

        public function  admin_search_item(request $request)
        {
            $search_text=$request->search;
            // dump( $search_text);
            $items =items::where('item_name','LIKE',"%$search_text%")->orwhere('item_Code','LIKE',"%$search_text%")->get();
            return view('admin.admin-view-items',compact('items'));
        }


                            //  supplier managment function

         public function  admin_view_supplier()
         {
            $suppliers = supplier::all();
            return view('admin.admin-view-supplier',compact('suppliers'));
         }

         public function admin_view_add_supplier_form()
         {
             return view('admin.admin-add-supplier-form');
         }
         public function admin_add_supplier_to_database(request $request)
        {

            $Suppliers=new supplier;
            $Suppliers->name=$request->name;
            $Suppliers->email=$request->email;
            $Suppliers->phone=$request->phone;
            $Suppliers->address=$request->address;
            $Suppliers->branch=$request->branch;
            $Suppliers->save();

            return redirect()->back()->with('message',' added successfuly');
        }
        public function admin_view_update_supplier_form($id)
        {
            $data=supplier::find($id);

            return  view('admin.admin-view-update-supplier-form',compact('data'));

        }
        public function admin_save_update_supplier_to_database(request $request,$id)
        {
            $data=supplier::find($id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->branch=$request->branch;
            $data->save();

            return redirect('admin-view-supplier')->with('message','Updated successfuly');
        }
        public function admin_delete_supplier($id)
        {
            $data=supplier::find($id);
            $data->delete();
            return redirect()->back()->with('message',' Deleted successfuly');
        }
        public function  admin_search_supplier(request $request)
        {
            $search_text=$request->search;
            // dump( $search_text);
            $suppliers =supplier::where('name','LIKE',"%$search_text%")->orwhere('phone','LIKE',"%$search_text%")->get();
            return view('admin.admin-view-supplier',compact('suppliers'));
        }


                   // billing

        public function admin_view_billing()
        {
           $data['items'] = DB::table('items')->get();
            return view("admin.admin-view-bill",$data);
        }
        public function admin_getPrice()
        {
            $getPrice = $_GET['id'];
            $price  = DB::table('items')->where('id', $getPrice)->get();
            return Response::json($price);
        }


    public function admin_add_item_to_bill(request $request )
    {

        $ic=$request->itemcode;
        $quantity = DB::table('items')->where('item_code',$ic)->value('quantity');

        // check qty

        if($quantity==0)
        {
            return redirect()->back()->with('message','This Item Out Of Stock');
        }
        else{
            if($quantity < $request->qty)
            {
                return redirect()->back()->with('message','This Quantity is not available');

            }
            else
            {
                            // update quntity in items table
                $data=new items;
                $qty=$request->qty;
                // $ic=$request->itemcode;
                // $quantity = DB::table('items')->where('item_code',$ic)->value('quantity');
                $data=$quantity-$qty;
                DB::table('items')->where('item_code',$ic)->update(['quantity' => DB::raw( $data),]);

                // save data to  billitemtempory table
                $data=new billitemtempory;

                $data->item_name=$request->itemname;
                $data->item_Code=$request->itemcode;
                $data->warranty=$request->warranty;
                $data->price=$request->price;
                $data->quantity=$request->qty;
                $data->save();
                return redirect()->back();
                }
            }


    }
       // proccesing bill view button
       public function admin_processing_billbutton()
       {
           return redirect('admin-view-process-bill');
       }



        public function admin_view_process_bill()
        {
            $data = billitemtempory::all();
            return view('admin.admin-view-processing-bill',compact('data'));

        }
        // delete prosess billtable item
        public function  admin_delete_processbill_row_item($id)
        {
            $data=billitemtempory::find($id);
            $data->delete();
            return redirect()->back();
        }

        // save bill histoty
        public function admin_save_billhistory(request $request )
        {
            $data=new invoicehistory;

            if($request->totle==0 or $request->sumqty==0)
            {
                return redirect()->back()->with('message',' Invalidate');

            }
            else {
                $data->totle_qty=$request->sumqty;
                $data->Totle_amount=$request->totle;
                $data->description=$request->warranty;
                $data->save();
                billitemtempory::truncate();
                //  model
                return redirect()->back();
            }


        }




                            //    sales report

            public function admin_view_sales_report()
            {
                $data = invoicehistory::all();
                return view('admin.admin-seles-report',compact('data'));
            }
            // delete invoice history tbale row
            public function admin_delete_invoice_histry_row($id)
            {
                $data=invoicehistory::find($id);
                $data->delete();
                return redirect()->back();
            }
            public function admin_filter_date_range(request $request)
            {
                $From=$request->From;
                $To=$request->To;

            $data= invoicehistory::whereBetween('created_at', [$From, $To])->get();
                // dump($data);
                return view('admin.admin-seles-report',compact('data'));

            }

                           // GRN

            public function  admin_view_grn()
            {
                // $data = invoicehistory::all();
                return view('admin.admin-view-grn');
                // ,compact('data')
            }









}
