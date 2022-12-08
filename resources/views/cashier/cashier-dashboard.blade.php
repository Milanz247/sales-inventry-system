<!DOCTYPE html>
<html lang="en">
<head>
    @include('cashier.tool.css')
</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
          <!-- HEADER-->
          @include('cashier.tool.header')

          <!--SIDEBAR-->
          @include('cashier.tool.sidebar')

          <!--dashboard-->
          @include('cashier.tool.dashboad')

          <!--  preloader -->
          @include('cashier.tool.preloader')

          <!-- script  -->
          @include('cashier.tool.script')
    </div>
</html>


