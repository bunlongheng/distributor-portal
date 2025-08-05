<?php
$segment1 = Request::segment(1);
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
$segment4 = Request::segment(4);
?>
<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li><i class="ace-icon fa fa-home home-icon"></i>

			@if(Auth::user()->type == 'Bioss' OR (Auth::user()->type) == 'Admin' ) 
			<a href="/distributors/list_view">Home</a>
			@else 
			<a href="/dashboard">Home</a>
			@endif


		</li>
		


		@if (isset($segment1))
		<li><a href="{{ URL::to('/')}}/{{$segment1}}">{{$segment1}}</a></li>
		@endif

		@if (isset($segment2))
		<li><a href="{{ URL::to('/')}}/{{$segment1}}/{{$segment2}}">{{$segment2}}</a></li>
		@endif

		@if (isset($segment3))
		<li><a href="{{ URL::to('/')}}/{{$segment1}}/{{$segment2}}/{{$segment3}}">{{$segment3}}</a></li>
		@endif

		@if (isset($segment4))
		<li><a href="{{ URL::to('/')}}/{{$segment1}}/{{$segment2}}/{{$segment3}}/{{$segment4}}">{{$segment4}}</a></li>
		@endif


		
	</ul>
</div>