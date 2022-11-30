<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
            <div class="topdv">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong>
                    {{ session()->get('message') }}

                </div>
                @endif

                <h2 class="h2top">Update  User</h2>
            </div>
            <div class="tabledev">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="{{ url('update-user-save', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" type="text" placeholder="name" value="{{ $data->name}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input value="{{ $data->email}}"  id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input value="{{ $data->phone}}" class="form-control" name="phone"  type="Number" placeholder="phone">
                            </div>

                            <div class="form-group">
                                <label>Usertype</label>
                                <input value="{{ $data->Usertype}}" class="form-control"name="usertype"  type="text" placeholder="usertype">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input value="{{ $data->position}}" class="form-control"name="position"  type="text" placeholder="position">
                            </div>
                            <div class="form-group">
                                <label>Nice</label>
                                <input class="form-control"name="Nice"  type="text" placeholder="Nice" value="{{ $data->Nice}}">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input value="{{ $data->Gender}}" class="form-control" name="Gender"  type="text" placeholder="Gender">
                            </div>



                            <div class="form-group">
                                <label>Address</label>
                                <input value="{{ $data->address}}" class="form-control" name="address"  type="text" placeholder="Address">
                            </div>



                            <div class="form-group">
                                <button class="btn btn-success btn-block">ADD USER </button>
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


</html>


