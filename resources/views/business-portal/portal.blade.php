@extends('adminlte::layouts.partials.biz-portal-layout')
@section('content')
    <div class="container-fluid">
        <div class="row flexbox" style="margin-left: 2em;margin-right: 2em;">
            @foreach($package_features as $feature)
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content" style="height: 300px;overflow-y: scroll">
                            <span class="card-title">{{$feature->feature_name}}</span>
                            <hr/>
                            @if($feature->feature_name =="Business Directory")
                                <p>{{"Business Name: " .$business->business_name}}</p>
                                <p>{{"Business Address: " .$business->business_address}}</p>
                                <p>{{"Business Email: " .$business->business_email}}</p>
                                <p>{{"Business Hours: " .$template->business_hours}}</p>
                                <p>{{"About Business: " .$template->business_about_us}}</p>
                                <p>{{"Service Description: " .$template->service_description}}</p>
                                <hr/>
                                <h5>Logo</h5>
                                <p><img src="{{$template->logo_url}}"/></p>
                            @endif
                        </div>
                        <div class="card-action">
                            @if($feature->feature_name =="Business Directory")
                                <a href="#" class="btn" id="{{"bd_".$feature->id}}">Edit Business Card</a>
                            @elseif($feature->feature_name =="Comment")
                                <a href="#" class="btn" id="{{"vm_".$feature->id}}">View More</a>
                            @else
                                <a href="#" class="btn" id="{{"gv_".$feature->id}}">View</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <style>
        p {
            color: black;
        }

        .card-title {
            font-weight: bolder !important;
        }
    </style>
@endsection
