<!DOCTYPE html>
<html lang="en">

<head>

    @include('manager.tool.css')
    <style>
        .center{
            margin: 40px;
        }
        .centeritem
        {
            margin: 40px  4px;
            display: flex;
            justify-content: space-between;
        }.buttondv
        {
            display: flex;
            justify-content: flex-end;
        }

    </style>

</head>

<body class="fixed-navbar">

    <div class="page-wrapper">

        <!-- START HEADER-->

        @include('manager.tool.header')

        <!-- END HEADER-->

        <!-- START SIDEBAR-->

          @include('manager.tool.sidebar')

        <!-- END SIDEBAR-->

        <div class="content-wrapper">
            <div class="center">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong>
                    {{ session()->get('message') }}

                </div>
                @endif
                @if(session()->has('check'))
                <div class="alert alert-danger alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Invaliide!</strong>
                    {{ session()->get('message') }}

                </div>
                @endif
            </div>
            <div class="center">
                <form action="manager-save-grn-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Select Item</label>
                            <select style="height:40px;" name="itemname" id="itemname"  class="form-control">
                                <option selected>Select Item</option>
                                @foreach($items as $row )
                                <option id={{$row->id}} value={{$row->item_name}} class="itemname custom-select">
                                {{$row->item_name}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Item Code.</label>
                                <input class="form-control"  readonly name="itemcode" id="itemcode" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Supplier</label>
                                    <select style="height:40px;" name="supplier" id="supplier"  class="form-control">
                                        <option selected>Select Supplier</option>
                                        @foreach($suppliers as $row )
                                        <option id={{$row->id}} value={{$row->name}} class="itemname custom-select">
                                        {{$row->name}}
                                        </option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="centeritem">
                        <div class="form-group">
                            <label>Buying Price</label>
                            <input class="form-control" name="buyingprice"  required="" type="text" placeholder="Enter Buying Price">
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input class="form-control" name="sellingprice"  required="" type="text" placeholder="Enter Sellin Price">
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input class="form-control" name="qty"  required="" type="text" placeholder="Enter Qty">
                        </div>
                        <div class="form-group">
                            <label>Warranty</label>
                            <input class="form-control" name="warranty"  required="" type="text" placeholder="Enter Warranty">
                        </div>
                    </div>
                    <div class="buttondv">
                        <div class="form-group">
                            <button style="width: 200px;" class="btn btn-success ">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--  preloader -->

        @include('manager.tool.preloader')

        <!--  END preloader -->

        <!-- script  -->

        @include('manager.tool.script')

    </div>

    <script>

        $(function(){

            $('#itemname').change(function() {
                 var ids =   $(this).find(':selected')[0].id;
                        $.ajax({
                        type:'GET',
                        url:'manager-grn-getPrice/{id}',
                        data:{id:ids},
                        dataType:'json',
                        success:function(data){

                            $.each(data, function(key, resp){

                                        // $('#price').val(resp.Selling_price);
                                        // $('#warranty').val(resp.warranty);
                                        $('#itemcode').val(resp.item_Code);
                                        // $('#avqty').text(resp. quantity);
                                        // $('#avqty').val(resp.quantity);


                             });
                        }
                        });
            });
        });
     </script>
</html>
