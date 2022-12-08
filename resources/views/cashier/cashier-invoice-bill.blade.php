<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <link href="dist/css/style.min.css" rel="stylesheet"> --}}
    {{-- <link href="assets/css/main.min.css" rel="stylesheet" /> --}}

</head>
<body>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>INVOICE</b> </h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h3> <span>Customer :-</span>{{$cname}} </h3>
                                {{-- Time.<h5> {{}} </h5> --}}
                                <h5> <span>Date :- </span>{{$date}} </h5>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item Code</th><span>   </span>
                                            <th>Item Name</th><span>   </span>
                                            <th class="text-right">price</th><span>   </span>
                                            <th class="text-right">warranty</th><span>   </span>
                                            <th class="text-right">Quantity</th><span>   </span>
                                        </tr>
                                    </thead>
                                    <tbody>

                                     @foreach ($billitemtempory as $item)
                                     <tr>
                                        <td class="text-center"> {{$item->item_Code}} </td><span>   </span>
                                        <td>{{$item->item_name}}</td><span>   </span>
                                        <td class="text-right">{{$item->price}} </td><span>   </span>
                                        <td class="text-right"> {{$item->warranty}}  </td><span>   </span>
                                        <td class="text-right"> {{$item->quantity}}  </td><span>   </span>
                                    </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                {{-- <p>Sub - Total amount: $13,848</p> --}}
                                {{-- <p>vat (10%) : $138 </p> --}}
                                <hr>
                                <h3><b>Total Rs:</b>{{$totle}} </h3>
                                <hr>
                                <h4><b>Payment Rs:</b>{{$pay}} </h4>
                                <h4><b>Balance Rs:</b>{{$balance}} </h4>

                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</body>
</html>

