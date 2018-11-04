@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4>Edit Bussiness</h4>
        <form class="col-md-10" method="POST" action="{{url('/businesses/update/'.$business->id) }}">
            {{ csrf_field() }}
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="business_name">Business Name</label>
                    <input placeholder="Business Name" value="{{$business->business_name}}" id="business_name"
                           name="business_name" type="text" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="business_email">Business Email</label>
                    <input class="form-control" id="business_email" name="business_email"
                           value="{{$business->business_email}}" type="email" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="business_contact_number">Contact Number</label>
                    <input class="form-control" id="business_contact_number"
                           value="{{$business->business_contact_number}}" name="business_contact_number" type="tel"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="business_type_id">Business Type</label>
                    <select id="business_type_id" class="form-control" name="business_type_id">
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$business->business_type_id==$type->id?'selected':''}}>{{$type->business_type_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="business_address">Business Address</label>
                    <textarea class="form-control" id="business_address" name="business_address" required
                              rows="5">{{$business->business_address}}</textarea>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Activate or DeActivate Account</label><br/><hr/>
                    <label class="radio-inline">
                        <input type="radio"  name="active" value="1" {{$business->active==1?'checked':''}}>Active
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="active" value="0" {{$business->active==0?'checked':''}}>In Active
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="business_username">Business Username</label><br/>
                    <input class="form-control" id="business_username" name="business_username" type="text"
                           value="{{$business->business_username}}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="passowrd">Password</label>
                    <input class="form-control" id="password" name="password" type="password" >
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
            </div>
    </div>
    <script>
        function goBack(e) {
//            e.preventDefault();
            window.history.back();
        }
    </script>
@endsection