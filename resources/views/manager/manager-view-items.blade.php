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
                    <div class="page-heading">
                        <h1 class="page-title">Items Table</h1>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="ibox">
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissable fade show">
                                <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong>
                                {{ session()->get('message') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <form action="{{url('manager-search-items')}} " method="">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" value="search" id="button-addon2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="ibox-body">

                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>

                                    <th>item_Code</th>
                                    <th>item_name</th>
                                    <th>item_description</th>
                                    <th>Buying_price</th>
                                    <th>Selling_price</th>
                                    <th>warranty</th>
                                    <th>quantity</th>
                                    <th>catagory_id</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>item_Code</th>
                                    <th>item_name</th>
                                    <th>item_description</th>
                                    <th>Buying_price</th>
                                    <th>Selling_price</th>
                                    <th>warranty</th>
                                    <th>quantity</th>
                                    <th>catagory_id</th>
                                    <th> Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $items as  $items):
                                <tr>

                                    <td>{{ $items->item_Code }}</td>
                                    <td>{{ $items->item_name }}</td>
                                    <td>{{ $items->item_description }}</td>
                                    <td>{{ $items->Buying_price	 }}</td>
                                    <td>{{ $items->Selling_price }}</td>
                                    <td>{{ $items->warranty }}</td>
                                    <td>{{ $items->quantity }}</td>
                                    <td>{{ $items->catagory_id }}</td>

                                    <td width="150">
                                        <a href="{{ url('manager-view-update-form',$items->id) }}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                        <a href="{{ url('manager-delete-items',$items->id) }}" onclick="return confirm ('Are you sure to Delete')">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <nav class="mt-4">
                            <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                            </ul>
                    </nav>
                    </div>
                 </div>
        </div>

    <!--  preloader -->

    @include('manager.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('manager.tool.script')


</html>
