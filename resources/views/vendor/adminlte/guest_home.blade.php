@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="slider">
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
@endsection
