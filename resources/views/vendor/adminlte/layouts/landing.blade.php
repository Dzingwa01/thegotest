@extends('adminlte::layouts.welcome_layout')

@section('content')
    <div class="container" style="margin-top:1em">
        <div class="carousel">
            @foreach($templates as $template)
                <a id="{{$template->business_id}}" class="carousel-item" onclick="goToBiz(this)" title="{{$template->business_name . ' - ' . $template->service_description}}" href="{{'#car_'.$template->id.'!'}}"><img
                            src="{{url($template->logo_url)}}"></a>
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
                            <img style="margin:auto;" class="center" src="{{URL::asset('/img/news.jpg')}}"/>
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

        });
        function goToBiz(obj){
            alert("clicked" +obj.id);
        }

    </script>
@endsection