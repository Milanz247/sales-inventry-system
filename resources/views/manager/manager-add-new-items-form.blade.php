<!DOCTYPE html>
<html lang="en">

<head>

    @include('manager.tool.css')

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
            <form action="{{ url('manager-add-item-to-database') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Item Code</label>
                    <input class="form-control" name=" itemid" type="text" placeholder=" Enter Item Code" required="">
                </div>
                <div class="form-group">
                    <label>Item Name</label>
                    <input class="form-control" name="itemname"  required="" type="text" placeholder="Enter Item Name">
                </div>


                <div class="form-group">
                    <label>Item Description</label>
                    <input class="form-control" name="itemdescription"  required="" type="text" placeholder="Enter item description">
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

    @include('manager.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('manager.tool.script')


</html>

