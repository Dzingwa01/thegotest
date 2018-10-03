@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="container" style="margin-top:3em;">
        <div id="normal_tracker" class="row">
            <div id="normal_tracker" class="step-container" style="width: 500px; margin: 0 auto"></div>
        </div>
        <h6 class="text-center text-capitalize" style="margin-top:0.5em;">Complete registration form below</h6>
        <div class="row">
            <form class="col s12 card" method="post" action="{{url('template_selection')}}" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="business_name">Business Name</label>
                        <input type="text" class="validate" id="business_name" name="business_name" required >
                    </div>
                    <input id="contact_person_id" name="contact_person_id" value="{{$user->id}}" hidden>
                    <div class="input-field col m6 s12">
                        <select id="business_type_id" name="business_type_id"  required>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->business_type_name}}</option>
                            @endforeach
                        </select>
                        <label for="business_type">Business Type</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="contact_name">Contact Person</label>
                        <input type="text" class="validate" id="contact_name" name="contact_name" required value="{{$user->name. ' ' .$user->surname}}" >
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="email" class="validate" id="business_email" name="business_email" value="{{$user->email}}" required >
                        <label for="business_email">Email address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="business_contact_number">Contact Number</label>
                        <input type="tel" class="validate" name="business_contact_number" required id="business_contact_number" value="{{$user->contact_number}}" >
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="business_address">Business Address</label>
                        <textarea type="text" class="materialize-textarea" name="business_address" id="business_address" required></textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="col offset-s5">
                        <button type="submit" class="btn btn-success">Next <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>
</div>
    <style>
        #current_order_tab:after {
            content: ""
        }
        .tabs .tab a:hover, .tabs .tab a.active {
            content: ""
        }

        .step:after {
            content: ""
        }

    </style>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.step-container').stepMaker({
                steps: ['Business Signup', 'Template Info', 'Packages&Contracts','Finish'],
                currentStep: 1
            });
        });
    </script>
@endsection


