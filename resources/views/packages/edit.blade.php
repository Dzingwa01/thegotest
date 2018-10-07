@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Edit Bussiness Package</h4>
        <form class="col-md-8" method="POST" action="{{url('/packages/update/'.$package->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Package Name</label>
                <input placeholder="Package Name" id="name" name="package_name" value="{{$package->package_name}}" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Package Description</label>
                <textarea class="form-control" id="description" name="package_description" rows="5" required>{{$package->package_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Package Price</label>
                <input class="form-control" id="package_price" name="package_price" type="number" required step="0.01" value="{{$package->package_price}}">
            </div>
            <h4 class="center">Package Features</h4>
            <div class="row">

                @foreach($packageFeature as $feature)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input id="{{$feature->id}}" type="checkbox" class="form-check-input" name="{{$feature->id}}">
                            <label class="form-check-label" for="{{$feature->id}}">{{$feature->feature_name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
            </div>

        </form>
    </div>
@endsection