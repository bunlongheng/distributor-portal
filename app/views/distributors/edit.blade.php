@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/css/root/float_label.css">

{{ Form::model($distributor,array('route' => array('distributors.update', $distributor->id),'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}

<div>
	<div id="user-profile-1" class="user-profile row align-left">

		<div class="col-sm-3 align-left">
			<h3 class="header  bigger black "><i class="icon-home3 cool-blue"></i> Company</h3>
			@include('distributors.sub.edit.company')
			<h3 class="header  bigger black "><i class="fa fa-truck cool-blue"></i> Logistics </h3>
			@include('distributors.sub.edit.logistic')

			@if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' )
			<h3 class="header black bigger"> <span class="icon-menu cool-blue "></span>

				Detail


			</h3>
			@include('distributors.sub.edit.detail')
			@endif



		</div>


		<div class="col-sm-1 col-sm-4 align-left"></div>


		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="icon-user cool-blue"></span> Contact </h3>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.main_contact')
			</div>

			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.sale_contact')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.support_contact')
			</div>

		</div>


		<div class="col-sm-1 col-sm-8 align-left"></div>



		<div class="col-sm-8   align-left ">
			<h3 class="header black  bigger"><span class="cool-blue icon-location2"></span> Address </h3>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.billing')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.shipping')
			</div>
			<div class="col-sm-4  align-left ">
				@include('distributors.sub.edit.hq')
			</div>
		</div>

	</div>
</div>
<div class="hr hr-32 dotted"></div>
<div class="center">


	<a class="blue  btn-lg  btn btn-default" href="/distributors/{{$distributor->id}}"> Cancel </a>

	{{ Form::submit ('Done',array('class'=> 'btn-lg btn btn-outline btn-info'))}}
</div>
<div class="hr hr-32 dotted"></div>
{{ Form::close()}}



<!-- Countries Auto Complete -->
<script type="text/javascript" src="/ac/scripts/jquery.mockjax.js"></script>
<script type="text/javascript" src="/ac/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/ac/scripts/countries.js"></script>
<script type="text/javascript" src="/ac/scripts/demo.js"></script>

<script type="text/javascript">

	function readLogo(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.company-logo').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#id-input-file-1").change(function(){
		readLogo(this);
	});


	console.log('{{ $distributor->active }}');

	if('{{ $distributor->active }}' == '2'){

		$('#account_status').prop('checked', false);
		$('#account_status').val(false);

	}else{

		$('#account_status').prop('checked', true);
		$('#account_status').val(true);

	}


	// console.log('Start');

	$('#account_status').change(function(){
        if ($(this).is(':checked')) {
            $(this).val(true);
            console.log($(this).val());
        } else {
            $(this).val(false);
            console.log($(this).val());
        }
    });

    // console.log('End');


</script>


@stop