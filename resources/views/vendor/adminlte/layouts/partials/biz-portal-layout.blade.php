<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>The Go - Simply One Click Away</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/jquery-step-maker.css">
</head>
<body>

<div class="navbar-fixed">
    <nav class="white" role="navigation" style="height: 5em;">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a id="logo-container" href="{{url('/')}}" class="brand-logo center"><img height="60px"
                                                                               src="{{URL::asset('/img/the_go_logo.png')}}"/>
            </a>
        </div>

    </nav>
    <ul id="slide-out" class="sidenav ">
        <li style="background-color: black;opacity: 0.8;"><div class="user-view">
                {{--<div class="background">--}}
                    {{--<img src="{{$template->logo_url}}">--}}
                {{--</div>--}}
                <a href="#user"><img class="circle" style="height: 160px;width: 160px;" src="{{is_null($template)?"":$template->logo_url}}"></a>
                <a href="#name"><span class="white-text name">{{Auth::user()->name . " ".Auth::user()->surname}}</span></a>
                <a href="#email"><span class="white-text email">{{$business->business_email}}</span></a>
            </div></li>
        <ul class="collapsible popout">
            <li>
            <div class="collapsible-header"> <i class="tiny material-icons">home</i><a href="#!" class="" style="color:black;" onclick="dashboard_show()"> Home</a>
            </div>
                <div class="collapsible-body" >
                </div>
            </li>
        </ul>
        <ul class="collapsible popout">
            <li>
                <div class="collapsible-header"> <i class="tiny material-icons">cloud_upload</i>
                    Upload</div>
                <div class="collapsible-body" >
                    <ul>
                    <li><a href="#" class="" style="color:black;font-weight: bolder;"><i class="tiny material-icons">redeem</i>Promotions Upload</a></li>
                        <li><a href="#" class="" style="color:black;font-weight: bolder;"><i class="tiny material-icons">queue</i>Menu Upload</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <hr>
        <ul class="collapsible popout">
            <li>
                <div class="collapsible-header"> <i class="tiny material-icons">supervisor_account</i>
                    Account Management</div>
                <div class="collapsible-body" >
                    <ul>
                        <li><a style="color:black;font-weight: bolder" class="" href="#!"><i
                                        class="tiny material-icons">account_circle</i>Manage Profile</a></li>
                        <li><a style="color:black;font-weight: bolder" href="{{ url('/logout') }}" class=""
                               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out-alt"></i>
                                Sign Out
                            </a></li>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="submit" value="logout" style="display: none;">
                        </form>
                    </ul>
                </div>
            </li>
        </ul>

    </ul>

</div>
<div class="row">
<div style="margin-top:3em;"><h4 class="center">{{$business->business_name ."  Dashboard"}}</h4></div>
<div class="row">
    @yield('content')
</div>
</div>

<footer class="page-footer container-fluid" style="background-color: black;opacity: 0.8;">
    <div class="container-fluid">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">About Us</h5>
                <p class="grey-text text-lighten-4">The Go simply 1 click away. We believe there is a better way to do
                    marketing.
                    A more viable way where customers are EARNED rather than bought. We're obsessively passionate about
                    it, and our
                    mission is to help company's achieve it !
                    We're excited to simplify great marketing and advertising giving a platform where everyone is
                    equally exposed </p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Services</h5>
                <ul>
                    <li><a class="white-text" href="#!">Excellent marketting platform for your business</a></li>

                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#contact_us"><i class="material-icons">email</i>
                            marketting@thego.net.za</a></li>
                    <li><a class="white-text" href="#!"><i class="material-icons">local_phone</i>077 244 5564</a></li>
                    <li><a class="white-text" href="#!"><i class="material-icons">web</i>Facebook</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="about_us" class="footer-copyright">
        <div class="container">
            Made by <a class="brown-text text-lighten-3" href="#">The Go</a>
        </div>
    </div>
</footer>
</div>
<style>

    .sidenav-overlay {
        z-index: 996;
    }
    /*header, main, footer {*/
        /*padding-left: 300px;*/
    /*}*/

    /*@media only screen and (max-width : 992px) {*/
        /*header, main, footer {*/
            /*padding-left: 0;*/
        /*}*/
    /*}*/
    @media only screen and (min-width: 993px) {
        nav a.sidenav-trigger {
            display: inline;
        }
    }

</style>
<!--  Scripts-->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="js/materialize.js"></script>

<script>
    $(document).ready(function () {
        console.log("initializing");
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
        });
        M.AutoInit();
    });
    function dashboard_show(){
//        alert("show");
    }

</script>
<script src="js/init.js"></script>
<script src="/js/jquery-step-maker.js"></script>
</body>
</html>
