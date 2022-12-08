
<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.tool.css')

</head>

<body class="fixed-navbar">

    <div class="page-wrapper">

        <!-- START HEADER-->

        @include('admin.tool.header')

        <!-- END HEADER-->

        <!-- START SIDEBAR-->

          @include('admin.tool.sidebar')

        <!-- END SIDEBAR-->

        <div class="content-wrapper">
            <div class="page-heading">
                {{-- <h1 class="page-title">Items Table</h1> --}}
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>!</strong>
                        {{ session()->get('message') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>item_Code</th>
                            <th>item_name</th>
                            <th>price</th>
                            <th>warranty</th>
                            <th>quantity</th>
                            <th>total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as  $items):
                        <tr>
                            <td>{{ $items->item_Code }}</td>
                            <td>{{ $items->item_name }}</td>
                            <td>{{ $items->price	 }}</td>
                            <td>{{ $items->warranty }}</td>
                            <td>{{ $items->quantity }}</td>
                            <td> {{$items->price*$items->quantity }} </td>
                            <td width="150">

                                <a href="{{ url('admin-delete-processbill-row-item',$items->id) }}" onclick="return confirm ('Are you sure to Delete')">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <form action="{{ url('admin-save-billhistory')}} " method="post">
                @csrf
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Total</label>
                            <input class="form-control"  type="text" name="totle" id="totle" readonly>
                            {{-- <span class="form-control" id="val" name="totle"></span> --}}
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Total Qty</label>
                            {{-- <span class="form-control" id="sumqty" name="sumqty"></span> --}}
                            <input class="form-control"  type="text" name="sumqty" id="sumqty"  readonly>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Pay</label>
                            <input class="form-control" id="pay" name="pay" type="text" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            {{-- <input required class="form-control"type="text" name="reme" id="reme"> --}}
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input required class="form-control"type="text" name="cname" id="cname">
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <button class="btn btn-warning" style="width: 100%; margin-top:28px;">Print Bill</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </form>

       </div>

    <!--  preloader -->

    @include('admin.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('admin.tool.script')
<script>

            var table = document.getElementById("table"), sumVal = 0 ,sumqty = 0;
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[5].innerHTML);
                sumqty = sumqty + parseInt(table.rows[i].cells[4].innerHTML);

            }
            document.getElementById("totle").value = sumVal;
            document.getElementById("sumqty").value=  sumqty;


         </script>
         <script>

// function(){
//              var pay=$("#pay").val();
//             document.getElementById("reme").value= sumVal-pay;


//             };
//          </script>


</html>


