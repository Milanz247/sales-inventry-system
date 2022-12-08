<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.tool.css')

    <style>
        #div1 {
  /*background-color: red;*/
  transform: translateY(33%);
}

#time {
  font-family: 'Nova Mono', monospace;
  font-size: 11vw;
  text-align: center;
  text-shadow: 0px 0px 20px;
}

#day {
  font-family: 'Eczar', serif;
  font-size: 7vmin;
  text-align: center;
  text-shadow: 0px 0px 20px blue;
}
#year
{

  font-family: 'Eczar', serif;
  font-size: 7vmin;
  text-align: center;
  text-shadow: 0px 0px 20px rgb(57, 57, 228);
}

    </style>

</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- HEADER-->
        @include('admin.tool.header')

        <!-- SIDEBAR-->
        @include('admin.tool.sidebar')

        <!--dashboard-->
        <div class="content-wrapper" >
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"> {{ $totalqty }}  </h2>
                                <div class="m-b-5">TOTLE ITEMS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"> <span>Rs :</span> {{$totlesale}} </h2>
                                <div class="m-b-5">Totle SALES</div><i class="ti-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">Rs 1570</h2>
                                <div class="m-b-5">DAILY</div><i class="fa fa-money widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">108</h2>
                                <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                                <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                            </div>
                        </div>
                    </div> --}}
                </div>

  {{-- <div id="div1">
    <p id="time"></p>
    <p id="date"></p>
  </div> --}}
                {{-- <div  class="col-xs-6 col-sm-6 col-md-6 ">
                    <span class="mt-4"> </span><span  class="mt-4" id="time"></span>
                    <span id="day"></span> : <span id="year"></span>

                 </div> --}}



            </div>
        </div>
        <div style="margin-top: 40px;" class="clock">

        </div>
        </div>


        <!--  preloader -->
        @include('admin.tool.preloader')

        <!-- script  -->
        @include('admin.tool.script')

        <script>
            $(document).ready(function(){

                    // Code for year

                    var currentdate = new Date();
                      var datetime = currentdate.getDate() + "/"
                         + (currentdate.getMonth()+1)  + "/"
                         + currentdate.getFullYear();
                         $('#year').text(datetime);



                    // Code for extract Weekday
                         function myFunction()
                          {
                             var d = new Date();
                             var weekday = new Array(7);
                             weekday[0] = "Sunday";
                             weekday[1] = "Monday";
                             weekday[2] = "Tuesday";
                             weekday[3] = "Wednesday";
                             weekday[4] = "Thursday";
                             weekday[5] = "Friday";
                             weekday[6] = "Saturday";

                             var day = weekday[d.getDay()];
                             return day;
                             }
                         var day = myFunction();
                         $('#day').text(day);
              });
         </script>
         <script>
            window.onload = displayClock();

             function displayClock(){
               var time = new Date().toLocaleTimeString();
               document.getElementById("time").innerHTML = time;
                setTimeout(displayClock, 1000);
             }
        </script>
</html>
