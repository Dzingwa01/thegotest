@extends('adminlte::layouts.welcome_layout')

@section('content')
    <div class="slider" style="margin-top:1em;">
        <ul class="slides">
            <li>
                <img src="{{URL::asset('/img/news1.jpg')}}" alt="News Article"> <!-- random image -->
                <div class="caption center-align">
                    <h3>News</h3>
                    <div class="row center">
                        <a href="" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">View More</a>
                    </div>
                </div>
            </li>
            <li>
                <img src="{{URL::asset('/img/event2.jpg')}}" alt="Event Information"><!-- random image -->
                <div class="caption center-align">
                    <h3>Event Information</h3>
                    <a href="" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">View More</a>
                </div>
            </li>
            <li>
                <img src="{{URL::asset('/img/event1.jpg')}}" alt="Los Angeles">
                <div class="caption center-align">
                    <h3>Event</h3>
                    <a href="" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">View More</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="container" style="margin-top:1em;">
        <div class="row" style="margin-top:1em;">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/business_directory.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin-top:2em;margin:auto;" class="center" src="{{URL::asset('/img/restaurants.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin-top:2em;margin:auto;" class="center" src="{{URL::asset('/img/transportation.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/routes.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:1em;">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/upcoming_events.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/news.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/travel.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img style="margin:auto;" class="center" src="{{URL::asset('/img/weather.jpg')}}" />
                        {{--<span class="card-title">Card Title</span>--}}
                    </div>
                    {{--<div class="card-content">--}}
                    {{--<p>PE Business Directory.</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-action">--}}
                    {{--<a href="#">This is a link</a>--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>

    </div>
    @endsection