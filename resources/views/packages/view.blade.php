@extends('adminlte::layouts.app')
@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Package Details</h4>
        <div class="row">
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
            <div class="form-group">
                <label for="duration">Package Duration (Months)</label>
                <input class="form-control" id="duration" name="duration" type="number" value="{{$package->duration}}" required>
            </div>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="active" value="true" {{$package->active==true?'checked':''}}>Active
                </label>
                <label class="radio-inline">
                    <input type="radio" name="active" value="false" {{$package->active==false?'checked':''}}>In Active
                </label>
            </div>
            <hr/>
            <h4 class="center">Package Features</h4>
            <div class="row">

                @foreach($features as $feature)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input id="{{$feature->id}}" type="checkbox" class="form-check-input" checked name="{{$feature->id}}">
                            <label class="form-check-label" for="{{$feature->id}}">{{$feature->feature_name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>

        </form>
    </div>
        <div class="row" style="margin:2em;">
            <a class="btn btn-primary center" onclick="goBack()">Back</a>
        </div>
    </div>
    <script>
        function goBack(){
            window.history.back();
        }
    </script>
@endsection