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
        <div class="container-fluid">
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
                {{--<ul class="nav navbar-nav navbar-right">--}}

                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>--}}
                        {{--<li><a href="{{ url('/business_register') }}">Register Business</a></li>--}}
                    {{--@else--}}
                        {{--<li><a href="/home">{{ Auth::user()->name }}</a></li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container" style="margin-top:8em;margin-bottom: 3em;">
    <form>
        <fieldset><legend>Bussiness Registration Details</legend>
            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" class="form-control" id="business_name" placeholder="Enter business name">
            </div>
            <div class="form-group">
                <label for="business_type">Business Type</label>
                <select id="business_type" name="business_type" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Person</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter contact person">
            </div>
        <div class="form-group">
            <label for="business_email">Email address</label>
            <input type="email" class="form-control" id="business_email" name="business_email" aria-describedby="emailHelp" placeholder="Enter business email address">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="business_contact_number">Contact Number</label>
            <input type="tel" class="form-control" name="business_contact_number" id="business_contact_number" placeholder="Contact Number">
        </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Business Address</label>
                <textarea type="text" class="form-control" name="business_address" id="contact_number" placeholder="Business address" rows="5"></textarea>
            </div>

        <button type="submit" class="btn btn-success">Submit</button>
        </fieldset>
    </form>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').select2({placeholder:"Select business type"});
        $('.carousel').carousel({
            interval: 3500
        })
    });

</script>

</body>
</html>
