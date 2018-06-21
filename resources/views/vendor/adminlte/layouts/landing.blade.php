<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The GO - Simply 1 Click Away ">
    {{--<meta name="author" content="Sergi Tur Badenas - acacha.org">--}}

    <meta property="og:title" content="The" />
    <meta property="og:type" content="website" />
    {{--<meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />--}}
    {{--<meta property="og:url" content="http://demo.adminlte.acacha.org/" />--}}
    {{--<meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />--}}
    {{--<meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />--}}
    {{--<meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />--}}
    {{--<meta property="og:sitename" content="demo.adminlte.acacha.org" />--}}
    {{--<meta property="og:url" content="http://demo.adminlte.acacha.org" />--}}

    {{--<meta name="twitter:card" content="summary_large_image" />--}}
    {{--<meta name="twitter:site" content="@acachawiki" />--}}
    {{--<meta name="twitter:creator" content="@acacha1" />--}}

    <title>The GO - Simply 1 Click Awaya</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }
</style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top" style="background-color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{URL::asset('/img/the_go_logo.png')}}" /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#" class="smoothScroll">About Us</a></li>
                    <li><a href="#" class="smoothScroll">Contact Us</a></li>
                    {{--<li><a href="#" class="smoothScroll">Restaurants</a></li>--}}
                    {{--<li><a href="#" class="smoothScroll">News</a></li>--}}
                    {{--<li><a href="#" class="smoothScroll">Weather</a></li>--}}
                    {{--<li><a href="#" class="smoothScroll">Travel</a></li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())
                        {{--<li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>--}}
                        <li><a href="{{ url('/register') }}">Register Business</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

<div class="container" style="margin-top:8em;">
    <div class="row" style="margin-top:1em;">
        <div class="col-md-2 col-sm-12 ">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/business_directory.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/restaurants.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/meal_special.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/transportation.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/routes.jpg')}}" />
        </div>
    </div>
    <div class="row" style="margin-top:3em;margin-bottom: 3em;">
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/upcoming_events.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/calendar.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/news.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/travel.jpg')}}" />
        </div>
        <div class="col-md-2 col-sm-12">
            <img style="margin-top:2em;" class="center" src="{{URL::asset('/img/weather.jpg')}}" />
        </div>
    </div>
</div>

    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                <p>
                   Kragga kama,<br/>
                    6001<br/>
                    Port Elizabeth
                </p>
            </div>

            <div class="col-lg-7">
                <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain">
                    <div class="form-group">
                        <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                Powered by The Go
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
