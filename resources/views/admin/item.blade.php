
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.tool.css')
    <style>
        .topdv{
            text-align: center;
            padding-top: 30px
        }
        .h2top{
            font-size: 30px;
            font-weight: 700;
            padding-bottom: 20px;
        }
        .centerform
        {
            background-color: white;
        }
        .tabledev{
            padding: 10px 240px;
        }

    </style>
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
            <div class="topdv">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong>
                    {{ session()->get('message') }}

                </div>
                @endif

                <h2 class="h2top">Add New Item</h2>
            </div>
            <div class="tabledev">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="{{ url('add_item') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Item id</label>
                                <input class="form-control" name=" itemid" type="text" placeholder="Item id" required="">
                            </div>
                            <div class="form-group">
                                <label>Item Name</label>
                                <input class="form-control" name="itemname"  required="" type="text" placeholder="item name">
                            </div>


                            <div class="form-group">
                                <label>Item Description</label>
                                <input class="form-control" name="itemdescription"  required="" type="text" placeholder="item description">
                            </div>

                            <div class="form-group">
                                <label>Buying Price</label>
                                <input class="form-control"name="buyingprice"  required="" type="text" placeholder="buying price">
                            </div>
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input class="form-control"name="sellingprice"  required=""  type="text" placeholder="selling price">
                            </div>
                            <div class="form-group">
                                <label>Warranty</label>
                                <input class="form-control"name="warranty"  required="" type="text" placeholder="Warranty">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="quantity" required=""  type="text" placeholder="quantity">
                            </div>

                            <div class="form-group">
                                <label>Catagory	</label>
                                <select class="form-control" required="" name="catagory">
                                    {{--  <option value="" selected=" " >add item here</option>  --}}
                                    @foreach ($catagory as $catagory )

                                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <button class="btn btn-success btn-block">ADD ITEM </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  preloader -->
            @include('admin.tool.preloader')
        <!--  END preloader -->

        <!-- script  -->
            @include('admin.tool.script')
    </div>
</body>
</html>


