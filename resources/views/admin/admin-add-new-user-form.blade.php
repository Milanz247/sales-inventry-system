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
                @if(session()->has('invalide'))
                <div class="alert alert-danger alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Invalide!</strong>
                    {{ session()->get('invalide') }}

                </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong>
                    {{ session()->get('message') }}

                </div>
                @endif

                <h2 class="h2top">Enter User Details</h2>
            </div>
            <div class="tabledev">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="{{ url('save-user-to-database') }}" method="POST" id="registration_form">
                            @csrf
                            <div class="form-group">
                                <label>Name.</label>
                                <span style="color:red;" class="error_form" id="fname_error_message"></span>
                                <input class="form-control" name="name" type="text" id="form_name" placeholder="name" required>
                            </div>

                            <div class="form-group">
                                <label>Email.</label>
                                <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone.</label>
                                <input maxlength="10"  class="form-control" name="phone"  type="text" placeholder="phone">
                            </div>

                            {{-- <div class="form-group">
                                <label>Usertype</label>
                                <input class="form-control"name="usertype"  type="text" placeholder="usertype">
                            </div> --}}

                            <div class="form-group">
                                <label>Position.</label>
                                <select class="form-control" required="" name="position" style=" height:40px; ">
                                    <option selected>Select User Type</option>
                                    <option >  Admin</option>
                                    <option >  Manager</option>
                                    <option > Cashier </option>

                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Position</label>
                                <input class="form-control"name="position"  type="text" placeholder="position">
                            </div> --}}
                            <div class="form-group">
                                <label >Nic.</label>
                                <input class="form-control"name="Nic" maxlength="12" type="text" placeholder="Nic">
                            </div>
                            {{-- <div class="form-group">
                                <label>Gender</label>
                                <input class="form-control"name="Gender"  type="text" placeholder="Gender">
                            </div> --}}
                            <div class="form-group">
                                <label>Gender.</label>
                                <select class="form-control" required="" name="Gender" style=" height:40px; ">
                                    <option selected> Select Gender</option>
                                    <option >  Male</option>
                                    <option >  Female</option>
                                    {{-- <option > Cashier </option> --}}

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address.</label>
                                <textarea class="form-control"   name="address" id="address" rows="3" ></textarea>
                            </div>

                            <div class="form-group">
                                <label>Password.</label>
                                <input required class="form-control" name="password" minlength="8" type="password" placeholder="Password">
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

    @include('admin.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('admin.tool.script')

{{--
     <script>
        $(function() {


            $("#password_error_message").hide();
            $("#phone_error_message").hide();


            var error_password = false;
            var error_ phone = false;


            $("#form_password").focusout(function() {
            check_password();
              });

            $("#form_ phone").focusout(function() {
                check_phone();
                });



              function check_password() {
                var password_length = $("#form_password").val().length;
                if (password_length < 8) {
                $("#password_error_message").html("Atleast 8 Characters");
                $("#password_error_message").show();
                $("#form_password").css("border-bottom","2px solid #F90A0A");
                error_password = true;
                } else {
                $("#password_error_message").hide();
                $("#form_password").css("border-bottom","2px solid #34F458");
                }
            }
            function check_phone() {
                var phone_length = $("#form_phone").val().length;
                if (phone_length < 10) {
                $("#phone_error_message").html("Atleast 10 Characters");
                $("#phone_error_message").show();
                $("#form_ phone").css("border-bottom","2px solid #F90A0A");
                error_password = true;
                } else {
                $("#phone_error_message").hide();
                $("#form_ phone").css("border-bottom","2px solid #34F458");
                }
            }
         $("#registration_form").submit(function() {

            error_password = false;
            error_phone = false;



            check_password();
            check_phone();



            if ( error_password === false) {
               alert("Are you sur to save");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });

        });
     </script> --}}



</html>


