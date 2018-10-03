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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/jquery-step-maker.css">
</head>
<body>
<div class="navbar-fixed container-fluid">

        <nav class="white" role="navigation" style="height: 5em;">
            <div class="nav-wrapper ">
                <a id="logo-container" href="{{url('/')}}" class="brand-logo"><img height="60px" src="{{URL::asset('/img/the_go_logo.png')}}" />  </a>
                <a href="#" data-target="slide-out" class="sidenav-trigger" style="color:teal"><i class="material-icons">menu</i></a>
                <ul id="dropdown1" class="dropdown-content">
                    <a  class="" href="{{ url('/login') }}">Sign  In</a><br/>
                    <a  class="" href="{{ url('/register') }}">Register</a>

                </ul>
                <ul id="dropdown2" class="dropdown-content">
                    <a  class="" href="{{ url('/login') }}">Sign  In</a><br/>
                    <a  class="" href="{{ url('/register') }}">Register</a>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/login')}}">Register Business</a></li>
                    <li><a href="#">Favourites</a></li>
                    <li>
                        <a style="color:black;font-weight: bolder;"  class="dropdown-trigger_cus2" data-toggle="dropdown" href="#dropdown2">
                            <i class="material-icons left">person_pin</i>
                            Account
                            <span class="caret"></span>
                        </a>
                    </li>
                </ul>

                <ul id="slide-out" class="sidenav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/login')}}">Register Business</a></li>
                    <li><a href="#">Favourites</a></li>
                    <li>
                        <a style="color:black;font-weight: bolder;"  class="dropdown-trigger_cus2" data-toggle="dropdown" href="#dropdown1">
                            <i class="material-icons left">person_pin</i>
                            Account
                            <span class="caret"></span>
                        </a>
                    </li>
                </ul>

            </div>

        </nav>

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
<script src="js/materialize.js"></script>

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
        $('.slider').slider({ full_width: true });
        $(".dropdown-trigger_cus").dropdown();
        $(".dropdown-trigger_cus2").dropdown();
        $('.sidenav').sidenav();

    });

</script>
<script src="js/init.js"></script>
<script src="/js/jquery-step-maker.js"></script>
</body>
</html>
