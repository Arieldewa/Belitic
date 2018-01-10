<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ URL::asset("assets/img/favicon.ico") }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ URL::asset("assets/css/animate.min.css")}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ URL::asset("assets/css/light-bootstrap-dashboard.css")}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href={{ URL::asset("assets/css/pe-icon-7-stroke.css")}} rel="stylesheet" />
    <meta name="token" id="token" value="{{ csrf_token() }}">

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ URL::asset("assets/img/sidebar-5.jpg")}}">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Admin Panel
                </a>
            </div>

            <ul class="nav">

                <li class="">
                    <a href="{{url('product')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{url('agent')}}">
                        <i class="pe-7s-portfolio"></i>
                        <p>Agent</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{url('distribution')}}">
                        <i class="pe-7s-paper-plane"></i>
                        <p>Distribusi</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{url('user')}}">
                        <i class="pe-7s-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{url('spk')}}">
                        <i class="pe-7s-users"></i>
                        <p>Analisa</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('logout')}}">
                                Logout
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield("content")
            </div>
        </div>




    </div>
</div>
</body>


<!--   Core JS Files   -->
<script src="{{ URL::asset("assets/js/jquery-1.10.2.js")}}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/js/bootstrap.min.js")}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ URL::asset("assets/js/bootstrap-checkbox-radio-switch.js")}}"></script>

<!--  Charts Plugin -->
<script src="{{ URL::asset("assets/js/chartist.min.js")}}"></script>

<!--  Notifications Plugin    -->
<script src="{{ URL::asset("assets/js/bootstrap-notify.js")}}"></script>



@yield('js')
</html>

