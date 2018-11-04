<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>The Go - Simply One Click Away</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/jquery-step-maker.css">
</head>
<body>
<div class="navbar-fixed container-fluid">
    <nav class="white" role="navigation" style="height: 5em;">
        <div class="nav-wrapper ">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a id="logo-container" href="{{url('/')}}" class="brand-logo"><img height="60px" src="{{URL::asset('/img/the_go_logo.png')}}" />  </a>


            <ul class="right hide-on-med-and-down">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('business_register')}}">Register Business</a></li>
                <li><a href="#">Favourites</a></li>

                <li><a class="dropdown-trigger_cus" data-target="dropdown2">{{Auth::user()->name . ' '. Auth::user()->surname}}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>

            <ul id="slide-out" class="sidenav">
                <li><div class="user-view">
                        <a href="#user"> <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" /></a>
                        <p style="color:black;font-weight: bolder">{{Auth::user()->name . ' '. Auth::user()->surname}}</p>
                        <p style="color:black;font-weight: bolder">{{Auth::user()->email}}</p>
                    </div></li>
                <hr>
                <ul class="collapsible popout" style="margin-top:2em;">
                    <li>
                        <div class="collapsible-header" style="color:black;"><i class="tiny material-icons">home</i><a
                                    style="color:black;" href="{{url('/')}}">Home</a>
                        </div>
                        <div class="collapsible-body">
                        </div>
                    </li>
                </ul>
                <ul class="collapsible popout" style="margin-top:2em;">
                    <li>
                        <div class="collapsible-header" style="color:black;"><i class="tiny material-icons">favorite</i>Favourites <a href="#!" class="" style="color:black;font-weight: bolder">
                            </a>
                        </div>
                        <div class="collapsible-body">
                        </div>
                    </li>
                </ul>
                <ul class="collapsible popout" style="margin-top:2em;">
                    <li>
                        <div class="collapsible-header" style="color:black;"><i class="tiny material-icons">business_center</i>
                            <a href="{{url('business_register')}}" class="" style="color:black;">Register Business</a>
                        </div>
                        <div class="collapsible-body">
                        </div>
                    </li>
                </ul>

                <hr>
                <ul class="collapsible popout">
                    <li>
                        <div class="collapsible-header" style="color:black;"> <i class="tiny material-icons">supervisor_account</i>
                            Account Management</div>
                        <div class="collapsible-body" >
                            <ul>
                                <li><a style="color:black;font-weight: bolder" class="" href="#!"><i
                                                class="tiny material-icons">account_circle</i>Manage Profile</a></li>
                                <li><a href="{{ url('/logout') }}" class=""
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>
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
    </nav>
    <ul id="dropdown1" class="dropdown-content">
        <a href="{{ url('/logout') }}" class=""
           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
            Sign Out
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="submit" value="logout" style="display: none;">
        </form>
        <li><a href="{{url('register')}}">Register</a></li>

    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="{{url('register')}}">Profile</a></li>
        <a href="{{ url('/logout') }}" class=""
           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
            Sign Out
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="submit" value="logout" style="display: none;">
        </form>


    </ul>
</div>
<div class="row">
        @yield('content')
</div>


<footer class="page-footer container-fluid" style="background-color: black;opacity: 0.8;">
    <div class="container-fluid">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">About Us</h5>
                <p class="grey-text text-lighten-4">The Go simply 1 click away. We believe there is a better way to do marketing.
                    A more viable way where customers are EARNED rather than bought. We're obsessively passionate about it, and our
                    mission is to help company's achieve it !
                    We're excited to simplify great marketing and advertising giving a platform where everyone is equally exposed </p>


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
                    <li><a class="white-text" href="#contact_us"><i class="material-icons">email</i> marketting@thego.net.za</a></li>
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
<style>

    .sidenav-overlay {
        z-index: 996;
    }
</style>
<!--  Scripts-->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    $(document).ready(function(){
        console.log("initializing");
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
        });
//        $('select').select2({placeholder:"Select business type"});
        $('select').formSelect();
        $('.slider').slider();
        $('.dropdown-trigger').dropdown();
        $('.sidenav').sidenav();
        $('.carousel').carousel({
            padding: 100,
            numVisible:5
        });
        setInterval(function() {
            $('.carousel').carousel('next');
        }, 4000);

    });

</script>
<script src="js/init.js"></script>
<script src="/js/jquery-step-maker.js"></script>
</body>
</html>
