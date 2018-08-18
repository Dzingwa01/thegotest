@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Bussiness Type Details</h4>
        <form class="col-md-8" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Type Name</label>
                <input placeholder="Type Name" id="name" name="business_type_name" type="text" value="{{$type->business_type_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Type Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$type->description}}</textarea>
            </div>


        </form>
    </div>
@endsection