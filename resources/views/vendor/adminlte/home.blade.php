@extends('adminlte::layouts.app')

<?php $users = App\User::all();$businesses = App\Business::all();$businesses_types=App\BusinessType::all();
?>
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 well-lg">
						<div class="box box-success">
							<div class="box-header with-border">
								{{--<h3>Users Report</h3>--}}
								<div class="info-box bg-green">
									<span class="info-box-icon"><i class="io ion-ios-people"></i> </span>
									<div class="info-box-content">
										<span class="info-box-text">Users</span>
										<span class="info-box-number">{{count($users)}}</span>
										<div class="progress">
											<div class="progress-bar" style="width:100%"></div>
										</div>
										<span class="progress-description">Total Users registered on the system</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 well-lg">
						<div class="box box-primary">
							<div class="box-header with-border">
								{{--<h3>Articles</h3>--}}
								<div class="info-box bg-aqua">
									<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i> </span>
									<div class="info-box-content">
										<span class="info-box-text">Businesses</span>
										<span class="info-box-number"> {{count($businesses)}}</span>
										<div class="progress">
											<div class="progress-bar" style="width:100%"></div>
										</div>
										<span class="progress-description">Total Registered Business</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 well-lg">
						<div class="box box-warning">
							<div class="box-header with-border">
								{{--<h3>Users Report</h3>--}}
								<div class="info-box bg-yellow">
									<span class="info-box-icon"><i class="io ion-ios-contacts"></i> </span>
									<div class="info-box-content">
										<span class="info-box-text">Business Types</span>
										<span class="info-box-number">{{count($businesses_types)}}</span>
										<div class="progress">
											<div class="progress-bar" style="width:100%"></div>
										</div>
										<span class="progress-description">Total Number Business Types</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
