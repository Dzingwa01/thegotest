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
                            class="fa fa-plus"></i>Generate Referral Code</a><br/>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered display responsive" id="packages-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Email Address</th>
                        <th>Referral Code</th>
                        <th>Duration</th>
                        <th>Redeemed</th>
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
                    <h4 class="modal-title">Generate Referal code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('referral_codes.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="feature_name">Email Address</label>
                            <input placeholder="Email Address" id="email_address" name="email_address" type="text" class="form-control" required>
                        </div>

                        <div id="duration" class="form-group" style="margin-top:1em;" >
                            <label for="duration">Code Duration(months)</label>
                            <input placeholder="Code Duration(months)" class="form-control" id="duration" name="duration"  required>
                        </div>
                        <div class="row">
                            <button style="margin-left: 1em;" class="btn btn-primary" id="generator">Generate Code</button>
                        </div>
                        <div id="referral_div" class="form-group" style="margin-top:1em;" hidden>
                            <label for="generated_code">Referral Code</label>
                            <input placeholder="Referral Code" class="form-control" id="generated_code" name="generated_code"  required>
                        </div>


                        <div class="row">
                            <button type="submit" class="btn btn-success pull-right" style="margin:1em;">Save</button>
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
                $('#packages-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{route('get_codes')}}',
                    columns: [
                        {data: 'email_address', name: 'email_address'},
                        {data: 'generated_code', name: 'generated_code'},
                        {data:'duration',name:'duration'},
                        {data:'activated',name:'activated'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            $(document).ready(function(){
                $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert").slideUp(500);
                });
                $('#generator').on('click',function(e){
                    e.preventDefault();
                   $("#referral_div").show();
                   $("#generated_code").val(makeid());
                });
            });
            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                text+="-";
                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                text+="-";
                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                text+="-";
                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                return text;
            }
        </script>
    @endpush

@endsection