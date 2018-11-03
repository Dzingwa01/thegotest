@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid box box-success">
        @if (session('status'))
            <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                {{ session('status') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a>
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col m3">
                <a id="" style="margin-top: 1em;margin-left: 1em;" class="btn btn-success" data-toggle="modal"
                   data-target="#add_slide"><i
                            class="fa fa-plus"></i>Add Slide</a><br/>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered display responsive" id="slides-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="add_slide" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Slide</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('slides.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Slide Name</label>
                            <input placeholder="Slide Name" id="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Slide Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="duration">Slide Duration</label>
                            <input class="form-control" id="duration" name="duration" type="number" required>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1" checked>Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0">In Active
                            </label>
                        </div>
                        <hr/>
                        <h4 class="center">Select Businesses</h4>
                        <div class="row">
                            @foreach($businesses as $biz)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input id="{{$biz->id}}" type="checkbox" class="form-check-input" name="{{$biz->id}}">
                                    <label class="form-check-label" for="{{$biz->id}}">{{$biz->business_name}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8"
                src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

        <script>
            $(function () {
                console.log("Check fire");
                $('#slides-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{route('get_slides')}}',
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'description', name: 'description'},
                        {data:'active',name:'active'},
                        {data:'duration',name:'duration'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
//        $('select[name="biztypes-table_length"]').css("display", "inline");

            });
            $(document).ready(function(){
                $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert").slideUp(500);
                });
            });
        </script>
    @endpush

@endsection