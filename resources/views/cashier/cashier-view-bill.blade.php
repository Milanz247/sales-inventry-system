<!DOCTYPE html>
<html lang="en">

<head>

    @include('cashier.tool.css')
    <style>
        .center{
            margin: 40px;
        }
        .title{
            margin-top: 30px;
            /* align-items: center; */
            display: flex;
            justify-content: center;


        }

    </style>
</head>

<body class="fixed-navbar">

    <div class="page-wrapper">

        <!-- START HEADER-->

        @include('cashier.tool.header')

        <!-- END HEADER-->

        <!-- START SIDEBAR-->

          @include('cashier.tool.sidebar')

        <!-- END SIDEBAR-->

        <div class="content-wrapper">

            <div class="container">
                <div class="row">
                  <div style="margin-top:50px; " class="col-sm">
                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Empty!</strong>
                        {{ session()->get('message') }}

                    </div>
                    @endif
                  </div>
                  <div class="col-sm">
                    <div class="title">
                        <h1 style="  font-weight: 700;
                        font-size: 50px;" >Create Bill .</h1>
                    </div>
                  </div>
                  <div style="justify-content: right;display:flex;" class="col-sm">
                    <a href="{{ url('cashier-processing-bill-button')}}" >
                        <button  type="button " style="margin-top: 70px;" class="btn btn-primary">Processing Bill <span></span> <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </a>
                </div>
                </div>
              </div>
            <div class="center">
             <form action="{{ url('cashier-add-item-to-bill') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Select Item</label>
                    <select name="itemname" id="itemname"  class="form-control">
                        @foreach($items as $row )
                        <option value=""></option>
                         <option id={{$row->id}} value={{$row->item_name}} class="itemname custom-select">
                           {{$row->item_name}}
                         </option>
                        @endforeach
                      </select>
                </div>
                <br><br><br>
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Item Code.</label>
                            <input class="form-control"  readonly name="itemcode" id="itemcode" >
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Warranty</label>
                            <input class="form-control" readonly name="warranty" id="warranty">
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label>Item Price</label>
                            <input class="form-control" id="price" name="price" type="text" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <br><br><br>
                  <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            <h6 style="color:red;" > Available items : <span id="avqty"> </span></h6>
                            <label>Quantity</label>
                            <input class="form-control" name="qty" type="text" id="qty">
                        </div>
                      </div>
                      <div class="col-sm">

                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <button class="btn btn-warning" style="width: 100%; margin-top:28px;">ADD TO BILL </button>
                        </div>
                      </div>
                    </div>
                  </div>
             </form>
            </div>
        </div>

    <!--  preloader -->

    @include('cashier.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('cashier.tool.script')

     <script>

        $(function(){

            $('#itemname').change(function() {
                 var ids =   $(this).find(':selected')[0].id;
                        $.ajax({
                        type:'GET',
                        url:'cashier-getPrice/{id}',
                        data:{id:ids},
                        dataType:'json',
                        success:function(data){

                            $.each(data, function(key, resp){

                                        $('#price').val(resp.Selling_price);
                                        $('#warranty').val(resp.warranty);
                                        $('#itemcode').val(resp.item_Code);
                                        $('#avqty').text(resp. quantity);
                                        // $('#avqty').val(resp.quantity);


                             });
                        }
                        });
            });
        });
     </script>
</html>


