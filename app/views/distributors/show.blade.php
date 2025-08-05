@extends('layouts.main')
@section('content')


{{--Style for auto complete when typing the country name input box--}}
<style type="text/css">
	.autocomplete-suggestions { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-no-suggestion { padding: 2px 5px;}
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }

</style>





<?php $export_type = $distributor->export_type()->first(); ?>






{{--Edit Button--}}
@if(Auth::user()->type != "Bioss")
<a href="{{ URL::to('distributors/'.$distributor->id.'/edit') }}" type="button" class="btn btn-warning btn-sm " title="Edit">
	Edit
</a>
@endif


{{--Edit Button--}}
@if(Auth::user()->type == "Admin")
	<a href="{{ URL::to('distusers/'.$distributor->id) }}" class="btn btn-sm btn-warning "> <span class="glyphicon glyphicon-user"></span> Accounts </a>
@endif


<div id="show" class="form-horizontal">
	<div id="user-profile-1" class="user-profile row align-left">

		<div class="col-sm-3 align-left">


			<h3 class="header black bigger"><span class="icon-quill cool-blue"></span> Registration


				@if(Auth::user()->type == "Admin")


				@elseif(Auth::user()->type == "Distributor")

				<div class="widget-toolbar">
					<label>

						<a id="badge" href="/account/change-password" > Change Password </a>

						<span class="lbl middle"></span>
					</label>
				</div>

				@else

				@endif



			</h3>

			{{--Registration--}}
			@include('distributors.sub.show.registration')

			<h3 class="header  bigger black "><i class="icon-home3 cool-blue"></i> Company</h3>

			{{--Company--}}
			@include('distributors.sub.show.company')

			<h3 class="header  bigger black "><i class="fa fa-truck cool-blue"></i> Logistics </h3>

			{{--Logistic--}}
			@include('distributors.sub.show.logistic')

			@if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' )

			<h3 class="header black bigger"> <span class="icon-menu cool-blue "></span>

				Detail




			</h3>

			{{--Detail--}}
			@include('distributors.sub.show.detail')

			@else

			<div class="form-group">
				<label class=" col-sm-4 control-label "> Member Since </label>
				<div class="col-sm-8">
					<span class="show-data">
						{{{ $date = DateHelper::getDateFormat1($distributor->start_date ) }}}

					</span>
				</div>
			</div>

			@endif

		</div>

		<div class="col-sm-1 col-sm-4 align-left"></div>





		{{--Contact--}}
		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="icon-user cool-blue"></span> Contact </h3>

			{{--Main--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.main_contact')
			</div>

			{{--Sale--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.sale_contact')
			</div>

			{{--Support--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.support_contact')
			</div>

		</div>

		<div class="col-sm-1 col-sm-8 align-left"></div>







		{{--Address--}}
		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="cool-blue icon-location2"></span> Address </h3>


			{{--Billing--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.billing')
			</div>

			{{--Shipping--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.shipping')
			</div>

			{{--HQ--}}
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.show.hq')
			</div>



			{{--Google Map of HQ Address --}}
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>


			{{--Enable this iframe will display the map base on distributor address automatically--}}
			<!-- <iframe class="pull-right" id="map" width="350" height="200"></iframe> -->






			{{--Script for the Map--}}
			<script  type="text/javascript">

				var address = document.getElementById("address").innerHTML;
				var q = encodeURIComponent(address);

				$('#map')
				.attr('src',
					'https://www.google.com/maps/embed/v1/place?key=AIzaSyDrAKRMY0XEmYglN8TALOJXHlUXgkYPKzY=&q='+q);

			</script>










			</div>

		</div>
	</div>


	@stop