@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="container" style="margin-top:3em;">
        <div id="normal_tracker" class="row">
            <div id="normal_tracker" class="step-container" style="width: 500px; margin: 0 auto"></div>
        </div>
        <div class="row">
            <form class="col s12 card" method="post" action="{{url('template_selection')}}" >
                {{ csrf_field() }}
                <p>{{$business->business_name}}, thank you for signing up. An email has been sent to {{$business->business_email}} with all
                the neccessary package and contract information.</p>
                <div class="row" style="margin-top:2em;margin-left: 2em;">
                    <label>Do you have a referal code?</label>
                    <p >
                        <label>
                            <input name="referal_code" type="radio" value="no"/>
                            <span>No</span>
                        </label>

                        <label>
                            <input name="referal_code" type="radio" value="yes" />
                            <span>Yes</span>
                        </label>
                    </p>
                    <div id="referal_div" class="input-field col m6 s12">
                        <label for="referral_code">Referal Code</label>
                        <input type="text" class="validate" id="referral_code" name="referal_code"  >
                    </div>

                </div>
                <div id="trial_div" class="row" style="margin-left: 2em;">
                    <p> Your free trial will expire in 30 days</p>
                </div>
                <div id="referal_code_div" style="margin-left: 2em;" class="row">
                    <p> Your free trial will expire in 45 days</p>
                </div>
                <div class="row">
                    <div class="col offset-s5">
                        <button type="submit" class="btn btn-success">Finish <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>

    </style>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script>

        $(document).ready(function(){
            $('.step-container').stepMaker({
                steps: ['Business Signup', 'Template Info', 'Packages&Contracts','Finish'],
                currentStep: 4
            });
            $("#referal_div").hide();
            $("#referal_code_div").hide();
            $("#trial_div").hide();

            $('input:radio').click(function () {
                var selected_val = $(this).val();
                if(selected_val=="yes"){
                    $("#referal_div").show();
                    $("#referal_code_div").show();
                    $("#trial_div").hide();
                }else{
                    $("#trial_div").show();
                    $("#referal_div").hide();
                    $("#referal_code_div").hide();
                }
            });
        });
    </script>
@endsection

{{--<div class="row">--}}
    {{--<nav class="white" role="navigation">--}}
        {{--<div class="nav-wrapper container">--}}
            {{--<a id="logo-container" href="#" class="brand-logo">Logo</a>--}}
            {{--<ul class="right hide-on-med-and-down">--}}
                {{--<li><a href="#">Home</a></li>--}}
            {{--</ul>--}}

            {{--<ul id="nav-mobile" class="sidenav">--}}
                {{--<li><a href="#">Home</a></li>--}}
            {{--</ul>--}}
            {{--<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>--}}
        {{--</div>--}}
    {{--</nav>--}}
    {{--<div id="index-banner" class="parallax-container">--}}
        {{--<div class="section no-pad-bot">--}}
            {{--<div class="container">--}}
                {{--<br><br>--}}
                {{--<h1 class="header center teal-text text-lighten-2">Parallax Template</h1>--}}
                {{--<div class="row center">--}}
                    {{--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>--}}
                {{--</div>--}}
                {{--<div class="row center">--}}
                    {{--<a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>--}}
                {{--</div>--}}
                {{--<br><br>--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="parallax"><img src="/img/background1.jpg" alt="Unsplashed background img 1"></div>--}}
    {{--</div>--}}
    {{--<div id="postings_container" class="container">--}}
        {{--<h3 class="center">Current Adverts</h3>--}}
    {{--</div>--}}

    {{--<footer class="page-footer teal">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col l6 s12">--}}
                    {{--<h5 class="white-text">Company Bio</h5>--}}
                    {{--<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>--}}


                {{--</div>--}}
                {{--<div class="col l3 s12">--}}
                    {{--<h5 class="white-text">Settings</h5>--}}
                    {{--<ul>--}}
                        {{--<li><a class="white-text" href="#!">Link 1</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 2</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 3</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 4</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col l3 s12">--}}
                    {{--<h5 class="white-text">Connect</h5>--}}
                    {{--<ul>--}}
                        {{--<li><a class="white-text" href="#!">Link 1</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 2</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 3</a></li>--}}
                        {{--<li><a class="white-text" href="#!">Link 4</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="footer-copyright">--}}
            {{--<div class="container">--}}
                {{--Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</footer>--}}
{{--</div>--}}
