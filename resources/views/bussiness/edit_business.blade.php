@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Edit Bussiness Type</h4>
    <form class="col-md-8" method="POST" action="{{url('/update_bussiness_type/'.$type->id) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Type Name</label>
            <input placeholder="Type Name" id="name" name="business_type_name" type="text" value="{{$type->business_type_name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Type Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$type->description}}</textarea>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
        </div>

    </form>
    </div>
@endsection