<!DOCTYPE html>
<html lang="en">
<head>
    @include('manager.tool.css')
</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!--HEADER-->
        @include('manager.tool.header')

        <!--SIDEBAR-->
        @include('manager.tool.sidebar')

        <div class="content-wrapper">
             {{-- dashboard --}}
        @include('manager.tool.dashboad')
        </div>


        <!--  preloader -->
        @include('manager.tool.preloader')

        <!-- script  -->
        @include('manager.tool.script')
</html>


