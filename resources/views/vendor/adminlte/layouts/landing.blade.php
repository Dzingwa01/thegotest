@extends('adminlte::layouts.welcome_layout')

@section('content')
    <div class="container" style="margin-top:1em">
        <div class="carousel">
            @foreach($templates as $template)
                <a id="{{$template->business_id}}" class="carousel-item tooltipped" onclick="goToBiz(this)" data-position="bottom" data-tooltip="{{$template->business_name . ' - ' . $template->service_description}}" href="{{'#car_'.$template->id.'!'}}">
                    <img src="{{url($template->logo_url)}}"></a>
            @endforeach
        </div>
    </div>
    <div class="divider"> </div>
        <div class="container" style="margin-top:1em;">
            <div class="row" style="margin-top:1em;">
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center"
                                 src="{{URL::asset('/img/business_directory.jpg')}}"/>
                        </div>

                    </div>
                </div>
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin-top:2em;margin:auto;" class="center"
                                 src="{{URL::asset('/img/restaurants.jpg')}}"/>
                        </div>
                    </div>
                </div>
                <div class="col col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin-top:2em;margin:auto;" class="center"
                                 src="{{URL::asset('/img/transportation.jpg')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/routes.jpg')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top:1em;">
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/upcoming_events.jpg')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>

                    </div>
                </div>
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/specials.png')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>

                    </div>
                </div>
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/travel.jpg')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>

                    </div>
                </div>
                <div class="col s3 m3">
                    <div class="card">
                        <div class="card-image">
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/weather.jpg')}}"/>
                            {{--<span class="card-title">Card Title</span>--}}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large" title="Extra Features">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="Emergency Contact"><i class="material-icons">call</i></a></li>
            <li><a class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Contact Us"><i class="material-icons">email</i></a></li>
            <li><a class="btn-floating tooltipped" data-position="left" data-tooltip="About us & Privacy Policy"><i class="material-icons">info_outline</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-tooltip="Navigator"><i class="material-icons">gps_fixed</i></a></li>
        </ul>
    </div>

    <style>
        .carousel {
            height: 250px;
        }
    </style>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function () {
            M.AutoInit();
//            $('.tooltipped').tooltip();
        });
        function goToBiz(obj){
            alert("clicked" +obj.id);
        }

    </script>
@endsection