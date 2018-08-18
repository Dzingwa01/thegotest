@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
	<div class="container-fluid box box-success">
		<div class="row">
		<div class="col m3" style="margin-top:1em;margin-bottom: 2em;margin-left: 1em;">
			<a href="{{url('create_user')}}" class="btn btn-success"><i class="fa fa-user"></i>Add User</a></li>
		</div>
		<div class="col m12">
			<table class="table table-bordered display responsive" id="users-table" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	</div>
	@push('custom-scripts')
		{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
		{{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
		{{--crossorigin="anonymous"></script>--}}
		{{--<link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8"
				src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
		{{--<script src="/js/materialize.js"></script>--}}
		{{--<script src="/js/init.js"></script>--}}
	<script>

	$(function() {
		$('#users-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('users_info')}}',
			buttons: [
					{
							text: 'My button',
							action: function ( e, dt, node, config ) {
									alert( 'Button activated' );
							}
					}
			],
			columns: [
				{ data: 'name', name: 'name' },
                { data: 'surname', name: 'surname' },
				{ data: 'email', name: 'email' },
				{ data: 'contact_number', name: 'contact_number' },
				{ data: 'display_name', name: 'display_name' },
				{ data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
				{data: 'action', name: 'action', orderable: false, searchable: false}

			]
		});

	});

	</script>
	@endpush
@endsection
