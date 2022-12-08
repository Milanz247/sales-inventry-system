<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\items;
use App\Models\supplier;
use App\Models\billitemtempory;
use App\Models\invoicehistory;
use PDF;




use App\Models\Invoicetbale;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class CashierController extends Controller
{

    public function cashier_dashboard()
    {
        return view('cashier.cashier-dashboard') ;

    }


                                //    billing

    public function cashier_view_billing()
    {
       $data['items'] = DB::table('items')->get();
        return view("cashier.cashier-view-bill",$data);
    }
    public function cashier_getPrice()
    {
        $getPrice = $_GET['id'];
        $price  = DB::table('items')->where('id', $getPrice)->get();
        return Response::json($price);
    }

    public function cashier_add_item_to_bill(request $request )
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
       public function cashier_processing_billbutton()
       {
           return redirect('cashier-view-process-bill');
       }



    public function cashier_view_process_bill()
    {
        $data = billitemtempory::all();
        return view('cashier.cashier-view-processing-bill',compact('data'));

    }
    // delete prosess billtable item
    public function  cashier_delete_processbill_row_item($id)
    {
        $data=billitemtempory::find($id);
        $data->delete();
        return redirect()->back();
    }

    // save bill histoty
    public function cashier_save_billhistory(request $request )
    {
        $data=new invoicehistory;
        if($request->totle==0 or $request->sumqty==0)
        {
            return redirect()->back()->with('wrong','!!!');
        }
        else {

                // $items = items::get();
                $data->totle_qty=$request->sumqty;
                $data->Totle_amount=$request->totle;
                $data->description=$request->cname;
                $data->save();


                $cname=$request->cname;
                $pay=$request->pay;
                $totle=$request->totle;
                $balance=$request->pay-$request->totle;
                $billitemtempory = billitemtempory::get();
                $data = [
                    'date' => date('m/d/Y'),
                    'billitemtempory' => $billitemtempory,
                    'cname' => $cname,
                    'pay' => $pay,
                    'totle' => $totle,
                    'balance' => $balance,
                ];
                $pdf = PDF::loadView('cashier.cashier-invoice-bill', $data);


                billitemtempory::truncate();

                return $pdf->download('Invoice Receipt.pdf');
                return redirect()->back();
        }
    }

    //    sales report
    public function cashier_view_sales_report()
    {
        $data = invoicehistory::all();
        return view('cashier.cashier-seles-report',compact('data'));
    }
    // delete invoice history tbale row
    public function  cashier_delete_invoice_histry_row($id)
    {
        $data=invoicehistory::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function cashier_filter_date_range(request $request)
    {
        $From=$request->From;
        $To=$request->To;

       $data= invoicehistory::whereBetween('created_at', [$From, $To])->get();
        // dump($data);
        return view('cashier.cashier-seles-report',compact('data'));

    }


}
