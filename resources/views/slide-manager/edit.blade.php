@extends('adminlte::layouts.app')


@section('main-content')
    <div class="container-fluid box box-success">
        <h4>Edit Bussiness Package</h4>
        <div class="row">
            <form class="col-md-8" method="POST" action="{{url('/slides/update/'.$slide->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Slide Name</label>
                    <input placeholder="Slide Name" id="name" name="name" type="text" class="form-control" value="{{$slide->name}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Slide Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{$slide->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Slide Duration</label>
                    <input class="form-control" id="duration" name="duration" type="number" value="{{$slide->duration}}" required>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="active" value="1" {{$slide->active==true?'checked':''}}>Active
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="active" value="0" {{$slide->active==false?'checked':''}}>In Active
                    </label>
                </div>
                <hr/>
                <h4 class="center">Select Businesses</h4>
                <div class="row">
                    @foreach($businesses as $biz)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input id="{{$biz->id}}" type="checkbox" class="form-check-input"
                                       {{in_array($biz->id,array_pluck($slide->businesses,'id'))?'checked':''}}
                                       name="{{$biz->id}}">
                                <label class="form-check-label" for="{{$biz->id}}">{{$biz->business_name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <a class="btn btn-primary pull-left" style="margin:1em;" onclick="goBack()">Back</a>
                    <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
                </div>

            </form>
        </div>

    </div>
    <script>
        function goBack(e){
            e.preventDefault();
            window.history.back();
        }
    </script>
@endsection