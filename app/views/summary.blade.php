@extends('layouts.main')
@section('content')

<?php 

$distributors_count = User::where('type','=','Distributor')->get()->count(); 

$pending_count = User::where('type','=','Distributor')->where('active','=', 0)->get()->count();
$active_count = User::where('type','=','Distributor')->where('active','=', 1)->get()->count();
$disable_count = User::where('type','=','Distributor')->where('active','=', 2)->get()->count(); 

$pending_count_percent =  ( $pending_count / $distributors_count ) * 100 ; 
$active_count_percent =  ( $active_count / $distributors_count ) * 100 ; 
$disable_count_percent =  ( $disable_count / $distributors_count ) * 100 ; 


$pending_user_distributors = User::where('type','=','Distributor')->where('active','=', 0)->orderBy('last_logged_in','asc')->get();
$active_user_distributors = User::where('type','=','Distributor')->where('active','=', 1)->orderBy('last_logged_in','asc')->get();
$disable_user_distributors = User::where('type','=','Distributor')->where('active','=', 2)->orderBy('last_logged_in','asc')->get();


$bioss_count = User::where('type','!=','Distributor')->get()->count(); 
$bioss_pending_count = User::where('type','!=','Distributor')->where('active','=', 0)->get()->count();
$bioss_active_count = User::where('type','!=','Distributor')->where('active','=', 1)->get()->count();
$bioss_pending_count_percent =  ( $bioss_pending_count / $bioss_count ) * 100 ; 
$bioss_active_count_percent =  ( $bioss_active_count / $bioss_count ) * 100 ; 
$bioss_disable_count_percent =  ( '0' / $bioss_count ) * 100 ; 
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
				<div class="center easy-pie-chart percentage" data-percent="{{substr($active_count_percent,0,2)}}" data-color="#59A84B">
					<span class="percent">{{substr($active_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				<a data-toggle="modal" data-target="#active_list"  >Active</a> 

				<h1 class="cool-blue lighter">{{$active_count}}</h1>

			</div>

			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="{{substr($pending_count_percent,0,2)}}" data-color="#f0ad4e">
					<span class="percent">{{substr($pending_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				Pending
				<h1 class="cool-blue lighter">{{$pending_count}}</h1>

				
			</div>

			<div class="grid4 center">
				<div class="center easy-pie-chart percentage" data-percent="{{substr($disable_count_percent,0,2)}}" data-color="#CACACA">
					<span class="percent">{{substr($disable_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				Disabled 
				<h1 class="cool-blue lighter">{{$disable_count}}</h1>

				
			</div>
		</div>

	</div>
</div>

@include('summary.modal')



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
				<div class="center easy-pie-chart percentage" data-percent="{{substr($active_count_percent,0,2)}}" data-color="#59A84B">
					<span class="percent">{{substr($bioss_active_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				<a data-toggle="modal" data-target="#bioss_active_list"  >Active</a> 

				<h1 class="cool-blue lighter">{{$bioss_active_count}}</h1>

			</div>

			<div class="grid4 center">
				<div class="easy-pie-chart percentage" data-percent="{{substr($pending_count_percent,0,2)}}" data-color="#f0ad4e">
					<span class="percent">{{substr($bioss_pending_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				Pending
				<h1 class="cool-blue lighter">{{$bioss_pending_count}}</h1>

				
			</div>

			<div class="grid4 center">
				<div class="center easy-pie-chart percentage" data-percent="{{substr($disable_count_percent,0,2)}}" data-color="#CACACA">
					<span class="percent">{{substr($bioss_disable_count_percent,0,2)}}%</span>
				</div>

				<div class="space-2"></div>
				Disabled 
				<h1 class="cool-blue lighter">0</h1>

				
			</div>
		</div>

		


	</div>
</div>


@include('summary.bioss_modal')





@stop




