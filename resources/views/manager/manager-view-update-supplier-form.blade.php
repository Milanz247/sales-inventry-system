<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    @include('manager.tool.css')
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

                <h2 class="h2top">Update Supplier</h2>
            </div>
            <div class="tabledev">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="{{ url('manager-save-update-supplier-to-database', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" value="{{ $data->name}}" name="name" type="text" placeholder="name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" value="{{ $data->email}}" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" value="{{ $data->phone}}" name="phone"  type="Number" placeholder="phone">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control"   value="{{ $data->address}}" name="address" id="address" ></input>
                            </div>

                            <div class="form-group">
                                <label>Branch</label>
                                <input class="form-control" value="{{ $data->branch}}" name="branch" type="text" placeholder="branch">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-block">Save</button>
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


