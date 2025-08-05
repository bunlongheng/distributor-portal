@extends('layouts.main')
@section('content')


<div>
	<div class="widget-box transparent">
		<div class="widget-header widget-header-small">
			<h4 class="widget-title blue smaller">
				<i class="ace-icon fa fa-rss orange"></i>
				Recent Activities
			</h4>

		</div>

		<div class="widget-body">
			<div class="widget-main padding-8">
				<div id="profile-feed-1" class="profile-feed">

					@foreach (ActivityLog::orderBy('created_at', 'desc')->get() as $log)
					<?php
						$user = $log->user()->first();
						$distributor = $user ? $user->distributor()->first() : null;
					?>

					<div class="profile-activity test">
						<div>
							@if (!$user)
								<a class="user" href="/users">[Deleted User]</a>
							@elseif ($user->type == 'Bioss' || $user->type == 'Admin')
								<a class="user" href="/users/{{$log->user_id}}"> {{ $user->firstname }}</a>
							@else
								<a class="user" href="/distributors/{{{ $distributor->id or '' }}}"> {{{ $distributor->company_name }}}</a>
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
			</div>
		</div>
	</div>
</div>

















































@stop


