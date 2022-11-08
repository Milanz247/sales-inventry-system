
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
                                <input class="form-control" name="itemid" type="text" placeholder="Item id">
                            </div>

                            <div class="form-group">
                                <label>Item Name</label>
                                <input id="item_name" type="email" placeholder="item_ name" class="form-control" name="item_name"  >
                            </div>

                            <div class="form-group">
                                <label>Item Description</label>
                                <input class="form-control" name="item_description"  type="text" placeholder="item description">
                            </div>

                            <div class="form-group">
                                <label>Buying Price</label>
                                <input class="form-control"name="buyingprice"  type="text" placeholder="buying price">
                            </div>
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input class="form-control"name="sellingprice"  type="text" placeholder="sellingprice">
                            </div>
                            <div class="form-group">
                                <label>Warranty</label>
                                <input class="form-control"name="warranty"  type="text" placeholder="Warranty">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="quantity"  type="text" placeholder="quantity">
                            </div>

                            <div class="form-group">
                                <label>catagory	</label>
                                <textarea class="form-control"   name="catagory	"	placeholder="catagory"></textarea>
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


