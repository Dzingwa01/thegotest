@extends('adminlte::layouts.app')
@section('main-content')
    <div class="container-fluid box box-success">
        <h4 >Slide Details</h4>
        <div class="row">
            <form class="col-md-8" method="POST" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Slide Name</label>
                    <input placeholder="Package Name" id="name" type="text" value="{{$slide->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Slide Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$slide->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Slide Duration</label>
                    <input id="duration" type="text" value="{{$slide->duration}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="duration">Is Active</label>
                    <input id="duration" type="text" value="{{$slide->active==true?'Yes':'No'}}" class="form-control">
                </div>
                @foreach($slide->businesses as $biz)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input id="{{$biz->id}}" type="checkbox" checked class="form-check-input" name="{{$biz->id}}">
                            <label class="form-check-label" for="{{$biz->id}}">{{$biz->business_name}}</label>
                        </div>
                    </div>
                @endforeach

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

