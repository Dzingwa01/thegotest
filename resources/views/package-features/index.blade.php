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
                   data-target="#add_package"><i
                            class="fa fa-plus"></i>Add Package Feature</a><br/>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered display responsive" id="packages-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="add_package" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Package Feature</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('package_features.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="feature_name">Feature Name</label>
                            <input placeholder="Feature Name" id="feature_name" name="feature_name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="feature_description">Feature Description</label>
                            <textarea class="form-control" id="feature_description" name="feature_description" rows="3" required></textarea>
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
                $('#packages-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{route('get_features')}}',
                    columns: [
                        {data: 'feature_name', name: 'feature_name'},
                        {data: 'feature_description', name: 'feature_description'},
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