@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Edit Bussiness Package</h4>
        <form class="col-md-8" method="POST" action="{{url('/package_features/update/'.$package->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Feature Name</label>
                <input placeholder="Feature Name" id="name" name="feature_name" value="{{$package->feature_name}}" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Feature Description</label>
                <textarea class="form-control" id="feature_description" name="feature_description" rows="5" required>{{$package->feature_description}}</textarea>
            </div>
            <div id="referral_div" class="form-group" style="margin-top:1em;" hidden>
                <label for="generated_code">Code Duration(months)</label>
                <input placeholder="Code Duration(months)" class="form-control" id="duration" name="duration" value=""  required>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
            </div>

        </form>
    </div>
@endsection