<!DOCTYPE html>
<html lang="en">

<head>

    @include('cashier.tool.css')

</head>

<body class="fixed-navbar">

    <div class="page-wrapper">

        <!-- START HEADER-->

        @include('cashier.tool.header')

        <!-- END HEADER-->

        <!-- START SIDEBAR-->

          @include('cashier.tool.sidebar')

        <!-- END SIDEBAR-->

        <div class="content-wrapper">

<h1>cashier </h1>

        </div>

    <!--  preloader -->

    @include('cashier.tool.preloader')

    <!--  END preloader -->

    <!-- script  -->

     @include('cashier.tool.script')


</html>


