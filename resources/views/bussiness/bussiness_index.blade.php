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
                            class="fa fa-plus"></i>Add New Business</a><br/>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered display responsive" id="businesses-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Business Type</th>
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
                    <h4 class="modal-title">Add Business</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('businesses.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input placeholder="Business Name" id="business_name" name="business_name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="business_email">Business Email</label>
                            <input class="form-control" id="business_email" name="business_email" type="email" required>
                        </div>
                        <div class="form-group">
                            <label for="business_contact_number">Contact Number</label>
                            <input class="form-control" id="business_contact_number" name="business_contact_number" type="tel" required>
                        </div>
                        <div class="form-group">
                            <label for="business_type_id">Business Type</label>
                            <select id="business_type_id" name="business_type_id">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->business_type_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="business_address">Business Address</label>
                            <textarea class="form-control" id="business_address" name="business_address" required rows="5"></textarea>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="business_username">Business Username</label>
                                <input class="form-control" id="business_username" name="business_username" type="text" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="passowrd">Password</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                            </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/en.js"></script>

        <script>
            $(function () {
                console.log("Check fire");
                $('#businesses-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{route('get_businesses')}}',
                    columns: [
                        {data: 'business_name', name: 'business_name'},
                        {data: 'business_email', name: 'business_email'},
                        {data:'business_contact_number',name:'business_contact_number'},
                        {data:'business_address',name:'business_address'},
                        {data:'business_type_name',name:'business_type_name'},
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
//                $("select").select2();

            });
        </script>
    @endpush

@endsection