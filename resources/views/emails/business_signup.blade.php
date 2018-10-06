@extends('adminlte::layouts.email_layout')
@section('content')
    <div class="container">
        <h4 class="center">Dear {{$business->business_name}},</h4>
        <div class="row">
            <p style="color:black;" class="center">
                Thank you for signing up with TheGo. We are dedicated to assist in making your marketting easier and efficient
                .Please find attached our terms and conditions, invoice and package information. Below is a brief outline of your package information.<br/>
            </p>
            <h4>{{'Package Name:'.$package->package_name .' at '.$package->package_price .' /pm'}} </h4>
            <p>Your package consists of the following features:<br/>
                {{$package->package_description}}
            </p>
            <p>For more information contact our sales team at sales@thego.co.za or via telephone on 041 258 3698.</p>
            <p>
                Welcome,<br/>
                TheGo Team
                <br/>
                <img height="60px" src="{{URL::asset('/img/the_go_logo.png')}}" />
            </p>

        </div>

    </div>
@endsection