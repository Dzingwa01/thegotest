@extends('adminlte::layouts.email_layout')
@section('content')
    <div class="container">
        <h4 class="center">Dear {{$user->name}},</h4>
        <div class="row">
            <p style="color:black;" class="center">
                Below is a referral code that you can use during signup for your free trial.<br/>
               <span style="font-weight: bolder">{{$code->generated_code}} </span> <br>
                We have amazing features to help you market your business. You can signup by clickng <a class="btn" href="http://thegotest.co.za/register">here</a>
            </p>

            <p>For more information contact our sales team at sales@thego.co.za or via telephone on 041 258 3698.</p>
            <p>
                Regards,<br/>
                TheGo Team
                <br/>
                <img height="60px" src="{{URL::asset('/img/the_go_logo.png')}}" />
            </p>

        </div>

    </div>
@endsection