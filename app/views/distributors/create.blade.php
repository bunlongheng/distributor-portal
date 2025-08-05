@extends('layouts.main')
@section('content')



<style type="text/css">
	.autocomplete-suggestions { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-no-suggestion { padding: 2px 5px;}
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	
</style>



{{ Form::open(array('url' => 'distributors/store', 'class' => 'form-horizontal', 'files'=>true)) }}
<div>
	<div id="user-profile-1" class="user-profile row align-left">
		
		<div class="col-sm-3 align-left">




			<h3 class="header  bigger black "><i class="icon-home3 cool-blue"></i> Company</h3>
			@include('distributors.sub.create.company')
			<h3 class="header  bigger black "><i class="fa fa-truck cool-blue"></i> Logistics </h3>
			
			@include('distributors.sub.create.logistic')
			<h3 class="header black bigger"> <span class="icon-menu cool-blue "></span> Detail </h3>
			@include('distributors.sub.create.detail')
		</div>
		
		<!-- ________________________________________ -->
		<div class="col-sm-1 col-sm-4 align-left"></div>
		<!-- ________________________________________ -->
		
		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="icon-user cool-blue"></span> Contact </h3>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.main_contact')
			</div>
			
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.sale_contact')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.support_contact')
			</div>
			
		</div>
		
		<!-- ________________________________________ -->
		<div class="col-sm-1 col-sm-8 align-left"></div>
		<!-- ________________________________________ -->
		
		
		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="cool-blue icon-location2"></span> Address </h3>
			
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.billing')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.shipping')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.create.hq')
			</div>
		</div>
		
	</div>
</div> 

<div class="center">
	<a class="blue btn-lg btn btn-default" href="{{URL::to('/distributors/')}}"> Cancel </a>
	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-lg btn-info', 'data-title'=>'Upload Company Logo '))}}
	<div class="hr hr-32 dotted"></div>
</div>
{{ Form::close()}}





<!-- Countries Auto Complete -->
<script type="text/javascript" src="/ac/scripts/jquery.mockjax.js"></script>
<script type="text/javascript" src="/ac/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/ac/scripts/countries.js"></script>
<script type="text/javascript" src="/ac/scripts/demo.js"></script>








@stop