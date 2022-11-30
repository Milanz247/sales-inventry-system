<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.tool.css')
    <style>
        .main2
        {

            margin-top: 50px;


        }
        .form-control{
            margin-bottom: 20px;

        }
            .pricediv
            {

                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .form-group {
                margin-bottom: 1rem;
                width: 400px;
            }
            .diva{
                display: flex;


                justify-items: right;
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
            {{--  <div class="main2">
            <form method="POST" name="sample">

                <br>
                    Roll No. <input class="inputb" type="number" name="rollno">
                    Roll No. <input class="inputb" type="number" name="rollno">
                    Name: <input class="inputb" type="text" name="name">

                    <br><br>
                    <div class="buton">

                        <input type="button" name="add" value="Add Data" onclick="addStudent();" class="btn btn-success"><hr>


                    </div>

                            <table id="tbl" class="table" border="1">
                                <thead>
                                <th>rollno</th>
                                <th>Name</th>
                                <th> Delete</th>
                                <th>Update</th>

                                </thead>

                                 <tbody>

                                 </tbody>
                             </table>

                </form>  --}}






            <div class="main2">
                <label for="">Select Supplier</label>
                <select class="form-control" name="" id="">
                    <option value="">milan</option>
                    <option value="">milan</option>
                </select>


                <label for="">Select Item</label>
                <select class="form-control" name="" id="">
                    <option value="">milan</option>
                    <option value="">milan</option>
                </select>

                <div class="pricediv">


                <div class="form-group">
                    <label>Buying Price</label>
                    <input class="form-control" name="itemname"  required="" type="text" placeholder="Enter Buying Price">
                </div>
                <div class="form-group">
                    <label>Sellin Price</label>
                    <input class="form-control" name="itemname"  required="" type="text" placeholder="Enter Sellin Price">
                </div>




                </div>
                <div class="pricediv">


                <div class="form-group">
                    <label>Qty</label>
                    <input class="form-control" name="itemname"  required="" type="text" placeholder="Enter Qty">
                </div>
                <div class="form-group">
                    <label>Warranty</label>
                    <input class="form-control" name="itemname"  required="" type="text" placeholder="Enter Warranty">
                </div>




                </div>
                <div class="diva">
                    <button class="btn btn-success btn-fix">Add</button>
                </div>




            </div>



            </div>

    <!--  preloader -->

    @include('admin.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('admin.tool.script')




</html>

