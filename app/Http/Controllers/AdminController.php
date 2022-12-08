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
use App\Models\grnhistry;
use PDF;



use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // =================================== ADMIN USER MANAGMENT START ===============================================  //


    // view admin  dashboard

    public function admin_dashboard()
    {
        $totalqty = DB::table('invoicehistories')->sum('totle_qty');
        $totalsale = DB::table('invoicehistories')->sum('Totle_amount');
        $From=0;
        $To=0;
        $data= invoicehistory::whereBetween('created_at', [$From, $To])->get();
        // dump($data);

        $data = [
            'totalqty' => $totalqty,
            'totlesale' => $totalsale,

        ];
        return view('admin.admin-dashboard', $data) ;
    }

    //  user managment function

    public function view_admin_users()
    {
        $users =User::orderBy('name','asc')->get();
        return view('admin.admin-view-users',compact('users')) ;
    }

    // add user form view

    public function   add_new_user_form()
    {
        return view('admin.admin-add-new-user-form') ;
    }

    // user save funtion

    public function  save_user_to_database(request $request)
    {
        $data=new user;
        //
        $request->validate([
            'phone' => 'required|numeric|max:10',
            // 'body' => 'required',
        ]);

        if($request->position=="Select User Type" or $request->Gender=="Select Gender" )
        {
            return redirect()->back()->with('invalide',' User Type or Position');
        }
        else
        {
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->position=$request->position;
            $data->address=$request->address;
            $data->Nice=$request->Nice;
            $data->Gender=$request->Gender;
            $data->password=Hash::make($request->password);

            if($request->position=="Admin")
            {
                $data->usertype=0;
            }
            if($request->position=="Manager")
            {
                $data->usertype=1;
            }
            if($request->position=="Cashier")
            {
                $data->usertype=2;
            }
            $data->save();
            return redirect()->back()->with('message','User added successfuly');
        }

    }

    // delete user function

    public function delete_user($id)
        {
             $data=user::find($id);
             $data->delete();
             return redirect()->back()->with('message','User Deleted  successfuly');
        }

    // update user view function

    public function update_user_form($id)
        {
            $data=user::find($id);
            return view ('admin.admin-update-user-form',compact('data'));
        }
    // save update user details funtion

    public function update_user_save(request $request,$id)
        {
            $data=user::find($id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->Nice=$request->Nice;
            // $data->usertype=$request->usertype;
            // $data->position=$request->position;
            // $data->Gender=$request->Gender;
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

     // ========================+============ ADMIN USER MANAGMENT END ===============================================  //



     // ==================================== ADMIN STOCK MANAGMENT START ============================================  //


        //  view catagory funtion

        public function  admin_view_catagory()
        {
            $data =catagory::orderBy('catagory_name','asc')->get();
            return view('admin.admin-catagory',compact('data')) ;
        }

        // add catgory funtion

        public function  admin_add_catagory(request $request)
        {
            $data=new catagory;
            $data->catagory_name=$request->catagory;
            $data->save();
            return redirect()->back()->with('message','catagory added successfuly');
        }

        //catagory delete funtion

        public function admin_delete_catagory($id)
        {
             $data=catagory::find($id);
             $data->delete();
             return redirect()->back()->with('message','Catagory Deleted successfuly');
        }

        //view items function

        public function admin_view_items()
        {
            $items = items::all();
            return view('admin.admin-view-items',compact('items'));
        }

        //delete item function

        public function  admin_delete_items($id)
        {
            $data=items::find($id);
            $data->delete();
            return redirect()->back()->with('message','item Deleted successfuly');
        }

        // add item form view function

        public function admin_view_add_new_item_form()
        {
            $catagory = catagory::all();
            return view('admin.admin-add-new-items-form',compact('catagory'));
        }

        //add items save function

        public function admin_add_item_to_database(request $request)
        {
            $items=new items;
            $items->item_Code=$request->itemid;
            $items->item_name=$request->itemname;
            $items->item_description=$request->itemdescription;
            $items->quantity=0;
            $items->catagory_id=$request->catagory;
            // $items->Buying_price=$request->buyingprice;
            // $items->Selling_price=$request->sellingprice;
            // $items->warranty=$request->warranty;
            $items->save();
            return redirect()->back()->with('message','Item added successfuly');
        }

        //update item view funtion

        public function admin_view_update_form($id)
        {
            $data=items::find($id);
            $catagory = catagory::all();
            return  view('admin.admin-update-item-form',compact('catagory'),compact('data'));
        }

        // update item save funtion

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

        //search item function

        public function  admin_search_item(request $request)
        {
            $search_text=$request->search;
            // dump( $search_text);
            $items =items::where('item_name','LIKE',"%$search_text%")->orwhere('item_Code','LIKE',"%$search_text%")->get();
            return view('admin.admin-view-items',compact('items'));
        }

        //view next month order function

        public function admin_view_next_month_order()
        {
            $items = DB::table('items')
            ->where('quantity', '<', 10)
            ->get();
             return view('admin.admin-view-next-month-oder',compact('items'));
        }

        //generate pdf for next month order

        public function admin_generatePDF(request  $request)
        {
            // $data=$request->Qty;
            // dump($request);
            $item = items::get();
            // dump($item);
            $data = [
                'title' => 'Monthly Order',
                'date' => date('m/d/Y'),
                'users' => $item
            ];
            $pdf = PDF::loadView('admin.admin-next-month-order-PDF', $data);
            return $pdf->download('Next month oeder.pdf');

    }


     // ==================================== ADMIN STOCK MANAGMENT END ============================================  //



     // ==================================== ADMIN SUPPLIER MANAGMENT START ============================================  //

        //  view sulliers function
         public function  admin_view_supplier()
         {
            $suppliers = supplier::all();
            return view('admin.admin-view-supplier',compact('suppliers'));
         }

         // view add supplier form function

         public function admin_view_add_supplier_form()
         {
             return view('admin.admin-add-supplier-form');
         }

         // save supplier function

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

        //update supplier function

        public function admin_view_update_supplier_form($id)
        {
            $data=supplier::find($id);
            return  view('admin.admin-view-update-supplier-form',compact('data'));
        }

        // update save function

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

        // supplier delete function

        public function admin_delete_supplier($id)
        {
            $data=supplier::find($id);
            $data->delete();
            return redirect()->back()->with('message',' Deleted successfuly');
        }

        // sepplier search function

        public function  admin_search_supplier(request $request)
        {
            $search_text=$request->search;
            // dump( $search_text);
            $suppliers =supplier::where('name','LIKE',"%$search_text%")->orwhere('phone','LIKE',"%$search_text%")->get();
            return view('admin.admin-view-supplier',compact('suppliers'));
        }

     // ==================================== ADMIN SUPPLIER MANAGMENT End ============================================  //



     // ==================================== ADMIN BILLING START ============================================  //

        //view bill page funtion

        public function admin_view_billing()
        {
           $data['items'] = DB::table('items')->get();
            return view("admin.admin-view-bill",$data);
        }

        //get item name to dropdown function

        public function admin_getPrice()
        {
            $getPrice = $_GET['id'];
            $price  = DB::table('items')->where('id', $getPrice)->get();
            return Response::json($price);
        }

        //add item to bill function

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
                //check qty (qty<request qty)
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

       //view add bills function

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

                //     $data=$request->Qty;
                // dump($request);
                // $item = items::get();
                // $data = [
                //     'title' => 'Monthly Order',
                //     'date' => date('m/d/Y'),
                //     'users' => $item
                // ];
                // $pdf = PDF::loadView('admin.admin-invoice-bill', $data);
                // return $pdf->download('Next month oeder.pdf');

                $data->totle_qty=$request->sumqty;
                $data->Totle_amount=$request->totle;
                $data->description=$request->cname;
                $data->save();
                billitemtempory::truncate(); // clear full billitem tempory table
                return redirect()->back();
            }


        }
  // ==================================== ADMIN SALES REPORT START ============================================  //

            // view sales report function

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

            //filter sales report

            public function admin_filter_date_range(request $request)
            {
                $From=$request->From;
                $To=$request->To;
                $data= invoicehistory::whereBetween('created_at', [$From, $To])->get();
                // dump($data);
                return view('admin.admin-seles-report',compact('data'));

            }
            public function admin_generate_sales_report_pdf(request $request)
            {

            // $data=$request->Qty;
            // dump($request);
            $From=$request->From;
            $To=$request->To;
            $details = invoicehistory::get();
            $data = [
                'title' => 'Sales report',
                'date' => date('m/d/Y'),
                'users' => $details
            ];
            $pdf = PDF::loadView('admin.admin-sales-report-PDF', $data);
            return $pdf->download('Sales report.pdf');

            }

// ==================================== ADMIN SALES REPORT END ============================================  //



// ==================================== ADMIN GRN  START ============================================  //

             // view grn function

            public function  admin_view_grn()
            {
                $data['items'] = DB::table('items')->get();
                $suppliers = supplier::all();
                return view("admin.admin-view-grn",$data,compact('suppliers') );


            }
            public function admin_grn_getPrice()
            {
                $getPrice = $_GET['id'];
                $price  = DB::table('items')->where('id', $getPrice)->get();
                return Response::json($price);
            }

            public function admin_save_grn_data(request $request)
            {

                // save grn history
                $grnhistry=new grnhistry;

                $grnhistry->supplier=$request->supplier;
                $grnhistry->item_code=$request->itemcode;
                $grnhistry->Buying_price=$request->buyingprice;
                $grnhistry->Selling_price=$request->sellingprice;
                $grnhistry->warranty=$request->warranty;
                $grnhistry->quantity=$request->qty;
                $grnhistry->totle_price=$request->buyingprice*$request->qty;
                $grnhistry->save();



                // update item table
                $Itemc=$request->itemcode;
                $buyingprice=$request->buyingprice;
                $sellingprice=$request->sellingprice;
                $warranty=$request->warranty;
                $qty=$request->qty;

                //  get qty value and add new value
                $quantity = DB::table('items')->where('item_code',$Itemc)->value('quantity');
                $qty=$quantity+$qty;

                    //  save data to item table
                DB::table('items')->where('item_code',$Itemc)->update([
                    'Buying_price' => DB::raw( $buyingprice),
                    'Selling_price' => DB::raw( $sellingprice),
                    'warranty' => DB::raw( $warranty),
                    'quantity' => DB::raw( $qty)
                ]);
                // return redirect()->back();
                return redirect()->back()->with('message','succesfully added');


            }
            public function admin_view_grn_history()
            {
                $data = grnhistry::all();
                return view('admin.admin-view-grn-history',compact('data'));
            }












}
