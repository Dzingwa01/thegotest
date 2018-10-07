@extends('adminlte::layouts.app')
@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Bussiness Type Details</h4>
        <form class="col-md-8" method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Package Name</label>
                <input placeholder="Package Name" id="name" type="text" value="{{$package->package_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Type Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$package->package_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Package Price</label>
                <input placeholder="Package Price" id="price" type="text" value="{{$package->package_price}}" class="form-control">
            </div>

        </form>
    </div>
@endsection