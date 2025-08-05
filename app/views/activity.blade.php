@extends('layouts.main')
@section('content')

<?php 

$distributors_count = User::where('type','=','Distributor')->get()->count(); 

$pending_count = User::where('type','=','Distributor')->where('active','=', 0)->get()->count();
$active_count = User::where('type','=','Distributor')->where('active','=', 1)->get()->count();
$disable_count = User::where('type','=','Distributor')->where('active','=', 2)->get()->count(); 

$pending_count_percent = round(( $pending_count / $distributors_count ) * 100 );
$active_count_percent = round(( $active_count / $distributors_count ) * 100 );
$disable_count_percent = round(( $disable_count / $distributors_count ) * 100 );


$pending_user_distributors = User::where('type','=','Distributor')->where('active','=', 0)->orderBy('last_logged_in','asc')->get();
$active_user_distributors = User::where('type','=','Distributor')->where('active','=', 1)->orderBy('last_logged_in','asc')->get();
$disable_user_distributors = User::where('type','=','Distributor')->where('active','=', 2)->orderBy('last_logged_in','asc')->get();


$bioss_count = User::where('type','!=','Distributor')->get()->count(); 
$bioss_pending_count = User::where('type','!=','Distributor')->where('active','=', 0)->get()->count();
$bioss_active_count = User::where('type','!=','Distributor')->where('active','=', 1)->get()->count();
$bioss_pending_count_percent = round( ( $bioss_pending_count / $bioss_count ) * 100 ); 
$bioss_active_count_percent = round( ( $bioss_active_count / $bioss_count ) * 100 ); 
$bioss_disable_count_percent = round( ( '0' / $bioss_count ) * 100 ); 
$pending_user_bioss = User::where('type','!=','Distributor')->where('active','=', 0)->orderBy('last_logged_in','asc')->get();
$active_user_bioss = User::where('type','!=','Distributor')->where('active','=', 1)->orderBy('last_logged_in','asc')->get();



?>


<div class="widget-body col-lg-6">
	<div class="widget-main padding-16">

		<h2 class="lighter">Distributors</h2>
		<div class="hr hr-16"></div>
		<div class="clearfix">
			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="100" data-color="#5bc0de">
					<span class="percent">100%</span>
				</div>

				<div class="space-2"></div>
				Total<h1 class="cool-blue lighter">{{$distributors_count}}</h1>
			</div>
			

			<div class="grid4 center" >
				<div class="center easy-pie-chart percentage" data-percent="{{$active_count_percent}}" data-color="#59A84B">
					<span class="percent">{{$active_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Active{{--<a data-toggle="modal" data-target="#active_list"  >Active</a> --}}

				<h1 class="cool-blue lighter">{{$active_count}}</h1>

			</div>

			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="{{$pending_count_percent}}" data-color="#f0ad4e">
					<span class="percent">{{$pending_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Pending
				<h1 class="cool-blue lighter">{{$pending_count}}</h1>

				
			</div>

			<div class="grid4 center">
				<div class="center easy-pie-chart percentage" data-percent="{{$disable_count_percent}}" data-color="#CACACA">
					<span class="percent">{{$disable_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Disabled 
				<h1 class="cool-blue lighter">{{$disable_count}}</h1>

				
			</div>
		</div>

	</div>
</div>

{{--@include('summary.modal')--}}



<div class="widget-body  col-lg-6">
	<div class="widget-main padding-16">

		<h2 class="lighter">Bioss Users</h2>
		<div class="hr hr-16"></div>
		<div class="clearfix">
			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="100" data-color="#5bc0de">
					<span class="percent">100%</span>
				</div>

				<div class="space-2"></div>
				Total<h1 class="cool-blue lighter">{{$bioss_count}}</h1>
			</div>
			

			<div class="grid4 center" >
				<div class="center easy-pie-chart percentage" data-percent="{{$bioss_active_count_percent}}" data-color="#59A84B">
					<span class="percent">{{$bioss_active_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Active{{--<a data-toggle="modal" data-target="#bioss_active_list"  >Active</a> --}}

				<h1 class="cool-blue lighter">{{$bioss_active_count}}</h1>

			</div>

			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="{{$bioss_pending_count_percent}}" data-color="#f0ad4e">
					<span class="percent">{{$bioss_pending_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Pending
				<h1 class="cool-blue lighter">{{$bioss_pending_count}}</h1>

				
			</div>

			<div class="grid4 center">
				<div class="center easy-pie-chart percentage" data-percent="{{$bioss_disable_count_percent}}" data-color="#CACACA">
					<span class="percent">{{$bioss_disable_count_percent}}%</span>
				</div>

				<div class="space-2"></div>
				Disabled 
				<h1 class="cool-blue lighter">0</h1>

				
			</div>
		</div>

		


	</div>
</div>


{{--@include('summary.bioss_modal')--}}


<div class="col-lg-12">
	<div class="widget-box transparent">
		<h2 class="lighter" style="padding-left:20px;">
			Recent Activity
		</h2>
		<div class="hr hr-16" style="margin-left:20px; margin-right:20px;"></div>

		<div class="widget-body">
			<div class="widget-main padding-16">
				<div id="profile-feed-1" class="profile-feed">

					@foreach ($logs as $log)
					<?php
						$user = $log->user()->first();
						$distributorUser = $user ? $user->distributor : null;
					?>
						<div class="profile-activity test">
							<div>
								@if (empty($user))
									<a class="user" href="/users">[Deleted User]</a>
								@else
									@if ($user->type == 'Bioss' || $user->type == 'Admin')
										<a class="user" href="/users/{{$log->user_id}}"> {{ $user->firstname }}</a>
									@else
										@if (!empty($distributorUser))
											<?php
												$distributor = $distributorUser->dist()->first();
											?>
											@if (empty($distributor))
												<a class="user" href="/users/{{$log->user_id}}"> {{ $user->firstname }}</a>
											@else
												<a class="user" href="/distributors/{{ $distributor->id }}"> {{ $distributor->company_name }}</a>
											@endif
										@else
											<a class="user" href="/users/{{$log->user_id}}"> {{ $user->firstname }}</a>
										@endif
									@endif
								@endif
								{{$log->action}} <b>{{$log->object}}</b>

								<b class="green">{{$log->name}}</b>
								on {{ DateHelper::getDateFormat2($log->created_at) }}
								at {{ DateHelper::getTime($log->created_at) }}
								<small class="cool-blue">
									( {{ DateHelper::getAgo($log->created_at) }} ago )
								</small>

							</div>


						</div>

					@endforeach



				</div>
				{{ $logs->links() }}
			</div>
		</div>
	</div>
</div>




@stop




