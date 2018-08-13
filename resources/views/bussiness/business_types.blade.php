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
                <a id="" style="margin-top: 1em;" class="btn" data-toggle="modal"
                   data-target="#add_bussiness_type"><i
                            class="fa fa-plus"></i>Add Business Type</a><br/>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="biztypes-table">
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

    <div id="add_bussiness_type" class="modal" role="dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title center">Add Bussiness Type</h4>
        </div>
        <div class="modal-body">
            <form class="col s12" role="form" method="POST" action="{{ route('add_bussiness_type') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s6 offset-m2">
                        <input placeholder="Type Name" id="name" name="name" type="text" class="validate"
                               required>
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-m2">
                        <textarea id="description" name="description" placeholder="Enter item description"
                                  class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="material-icons left">add</i>
                            Save
                        </button>
                    </div>
                    <div>
                        {{-- <a class="btn" style="margin-left:12em!important;"   onclick="add_category()"> Save</a> --}}
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script>

    $(function () {
        $('#biztypes-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route('bussiness_types')}}',
            columns: [
                {data: 'business_type_name', name: 'business_type_name'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('select[name="biztypes-table_length"]').css("display", "inline");
    });
</script>

@endsection