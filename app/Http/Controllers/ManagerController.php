<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\items;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use App\Models\billitemtempory;
use App\Models\invoicehistory;
use App\Models\grnhistry;
use PDF;


class ManagerController extends Controller
{
    public function manager_dashboard()
    {
        return view('manager.manager-dashboard') ;

    }


                    //  stock managment function
    // catagory part
    public function  manager_view_catagory()
    {
        $data =catagory::orderBy('catagory_name','asc')->get();
        return view('manager.manager-catagory',compact('data')) ;
    }

    public function  manager_add_catagory(request $request)
    {
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();

        return redirect()->back()->with('message','catagory added successfuly');


    }
    public function manager_delete_catagory($id)
    {
         $data=catagory::find($id);
         $data->delete();

         return redirect()->back()->with('message','Catagory Deleted successfuly');

    }

    // item parts
    public function manager_view_items()
    {
        $items = items::all();
        return view('manager.manager-view-items',compact('items'));

    }
    public function  manager_delete_items($id)
        {
            $data=items::find($id);
            $data->delete();

            return redirect()->back()->with('message','item Deleted successfuly');
        }

        public function manager_view_add_new_item_form()
        {
            $catagory = catagory::all();
            return view('manager.manager-add-new-items-form',compact('catagory'));
        }

        public function manager_add_item_to_database(request $request)
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
        public function manager_view_update_form($id)
        {
            $data=items::find($id);
            $catagory = catagory::all();
            return  view('manager.manager-update-item-form',compact('catagory'),compact('data'));
        }
        public function  manager_update_item_save_database(request $request,$id)
        {
            $data=items::find($id);

            $data->item_Code=$request->itemcode;
            $data->item_name=$request->itemname;
            $data->item_description=$request-> itemdescription;
            $data->catagory_id=$request->catagory;
            $data->save();

            return redirect('admin-view-items')->with('message','Updated successfuly');
        }
        public function  manager_search_item(request $request)
        {
            $search_text=$request->search;
            // dump( $search_text);
            $items =items::where('item_name','LIKE',"%$search_text%")->orwhere('item_Code','LIKE',"%$search_text%")->get();
            return view('manager.manager-view-items',compact('items'));
        }

                            //  supplier managment functio

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


                          //  supplier managment function

        public function  manager_view_supplier()
        {
           $suppliers = supplier::all();
           return view(' manager.manager-view-supplier',compact('suppliers'));
        }

        public function  manager_view_add_supplier_form()
        {
            return view(' manager.manager-add-supplier-form');
        }
        public function  manager_add_supplier_to_database(request $request)
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
       public function  manager_view_update_supplier_form($id)
       {
           $data=supplier::find($id);
           return  view(' manager.manager-view-update-supplier-form',compact('data'));
       }
       public function  manager_save_update_supplier_to_database(request $request,$id)
       {
           $data=supplier::find($id);
           $data->name=$request->name;
           $data->email=$request->email;
           $data->phone=$request->phone;
           $data->address=$request->address;
           $data->branch=$request->branch;
           $data->save();

           return redirect('manager-view-supplier')->with('message','Updated successfuly');
       }
       public function  manager_delete_supplier($id)
       {
           $data=supplier::find($id);
           $data->delete();
           return redirect()->back()->with('message',' Deleted successfuly');
       }
       public function   manager_search_supplier(request $request)
       {
           $search_text=$request->search;
           // dump( $search_text);
           $suppliers =supplier::where('name','LIKE',"%$search_text%")->orwhere('phone','LIKE',"%$search_text%")->get();
           return view(' manager.manager-view-supplier',compact('suppliers'));
       }



        //    billing
        public function manager_view_billing()
        {
        $data['items'] = DB::table('items')->get();
            return view("manager.manager-view-bill",$data);
        }
        public function manager_getPrice()
        {
            $getPrice = $_GET['id'];
            $price  = DB::table('items')->where('id', $getPrice)->get();
            return Response::json($price);
        }
        public function manager_add_item_to_bill(request $request )
        {

            $ic=$request->itemcode;
            $quantity = DB::table('items')->where('item_code',$ic)->value('quantity');

            // check qty

            if($quantity==0 or $quantity < $request->qty)
            {
                return redirect()->back()->with('message','This Item Out Of Stock');
            }
            else{

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
        // proccesing bill view button
        public function manager_processing_billbutton()
        {
            return redirect('manager-view-process-bill');
        }



        public function manager_view_process_bill()
        {
            $data = billitemtempory::all();
            return view('manager.manager-view-processing-bill',compact('data'));

        }
        // delete prosess billtable item
        public function  manager_delete_processbill_row_item($id)
        {
            $data=billitemtempory::find($id);
            $data->delete();
            return redirect()->back();
        }

        // save bill histoty
        public function manager_save_billhistory(request $request )
        {
            $data=new invoicehistory;

            if($request->totle==0 or $request->sumqty==0)
            {
                return redirect()->back()->with('wrong',' Invalidate');

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
        // save bill histoty
        // public function manager_save_billhistory(request $request )
        // {
        //     $data=new invoicehistory;

        //     $data->totle_qty=$request->sumqty;
        //     $data->Totle_amount=$request->totle;
        //     $data->description=$request->warranty;
        //     $data->save();
        //      billitemtempory::truncate();
        //     //  model
        //     return redirect()->back();
        // }

                      // billing
        public function manager_view_sales_report()
        {
            $data = invoicehistory::all();
            return view('manager.manager-seles-report',compact('data'));
        }
        // delete invoice history tbale row
        public function manager_delete_invoice_histry_row($id)
        {
            $data=invoicehistory::find($id);
            $data->delete();
            return redirect()->back();
        }
        public function manager_filter_date_range(request $request)
        {
            $From=$request->From;
            $To=$request->To;

        $data= invoicehistory::whereBetween('created_at', [$From, $To])->get();
            // dump($data);
            return view('manager.manager-seles-report',compact('data'));

        }

                    // gRN
        public function  manager_view_grn()
        {
            $data['items'] = DB::table('items')->get();
            $suppliers = supplier::all();
            return view("manager.manager-view-grn",$data,compact('suppliers') );


        }
        public function manager_grn_getPrice()
        {
            $getPrice = $_GET['id'];
            $price  = DB::table('items')->where('id', $getPrice)->get();
            return Response::json($price);
        }

        public function manager_save_grn_data(request $request)
        {
            $check=$request->supplier;
                if($check=="Select Supplier")
                {
                    return redirect()->back()->with('check',' Please Select Supplier');
                }
                else{
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

        }
        public function manager_view_grn_history()
        {
            $data = grnhistry::all();
            return view('manager.manager-view-grn-history',compact('data'));
        }




        //generate pdf for next month order
        public function generatePDF()
        {
            $item = items::get();

            $data = [
                'title' => 'Welcome to ItSolutionStuff.com',
                'date' => date('m/d/Y'),
                'users' => $item
            ];

            $pdf = PDF::loadView('manager.myPDF', $data);

            return $pdf->download('itsolutionstuff.pdf');
        }












    //    get next month order
    public function manager_view_next_month_order()
    {
     $items = DB::table('items')
     ->where('quantity', '<', 10)
     ->get();

      return view('manager.manager-view-next-month-oder',compact('items'));

    }


}
