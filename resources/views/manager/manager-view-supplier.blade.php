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
                <h1 class="page-title">Supplier Table</h1>
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
                <form action="{{ url('manager-search-supplier') }}" method="">
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
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th> Action</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        @foreach ( $suppliers as $suppliers)
                        <tr>
                            <td>{{ $suppliers->id}}</td>
                            <td>{{  $suppliers->name }}</td>
                            <td>{{  $suppliers->email }}</td>
                            <td>{{  $suppliers->phone }}</td>
                            <td>{{  $suppliers->address }}</td>
                            <td>{{ $suppliers->branch }}</td>
                            <td width="150">
                                <a href="{{ url('manager-view-update-supplier-form',$suppliers->id) }}">
                                    <button class="btn btn-info">Edit</button>
                                </a>
                                <a href="{{ url('manager-delete-supplier',$suppliers->id) }}" onclick="return confirm ('Are you sure to Delete')">
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

    <!--  preloader -->

    @include('manager.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('manager.tool.script')


</html>


