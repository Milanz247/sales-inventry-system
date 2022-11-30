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
        .addfrm
        {
            display: flex;
        }
        .btn-success
        {
            margin-left: 20px;
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


                <h2 class="h2top">Add New Catagory</h2>
            </div>
            <div class="tabledev">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="{{ url('admin-add-catagory') }}" method="post">
                            @csrf
                            <div class="addfrm">
                                <input class="form-control" name="catagory" type="text" placeholder="Enter Catagory">
                                <button class="btn btn-success"> ADD </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Catagory Name</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Catagory Name</th>
                        <th> Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach ($data as $data)
                    <tr>

                        <th scope='row'>1</th>
                        <td>{{ $data->catagory_name }}</td>

                        <td width="150">

                            <a onclick="return confirm ('Are you sure to Delete')" href="{{ url('admin-delete-catagory',$data->id) }}" onclick="confirm('Are you sure?')">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

        </div>

    <!--  preloader -->

    @include('admin.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('admin.tool.script')


</html>


