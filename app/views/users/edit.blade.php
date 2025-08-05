@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="/css/root/float_label.css">




<!-- Header_________________________________________________________________________  -->
<div class="page-content-area">
	<div class="page-header">
		<h1 class="green">
			Bioss Users
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Edit
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

{{ Form::model($user,array('route' => array('users.update', $user->id),'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}



<div class="row">
	
	<div  class="col-lg-3">

		<div class="form-group ">
			<label class="col-sm-4 control-label required " for="discount_rate_info">Type </label>

			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="ace-icon fa fa-key"></i>
					</span>

					{{ Form::select('type', array('Bioss' => 'Bioss', 'Admin' => 'Admin'), $user->type) }}
				</div>
			</div>
		</div>

		<div class="form-group ">
			<label class="col-sm-4 control-label required " for="discount_rate_info">Group </label>

			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="ace-icon fa fa-key"></i>
					</span>

					{{ Form::select('group', array( 'Executive' => 'Executive','Admin' => 'Admin','Accounting' => 'Accounting', 'Product' => 'Product', 'Support' => 'Support', 'Orders' => 'Orders'), $user->group ); }}
				</div>
			</div>
		</div>


		<div class="form-group"> 

			<label class="control-label required col-sm-4 " for="firstname">First Name </label>

			<div class="col-sm-8 form-group float-label-control ">
				<div class="clearfix">
					{{ Form::text ('firstname', isset($user->firstname) ? $user->firstname : '') }}
				</div>
			</div>
		</div>


		<div class="space-2"></div> 

		<div class="form-group">
			<label class="control-label required col-sm-4 " for="lastname"> Last Name </label>

			<div class="col-sm-8 form-group float-label-control ">
				<div class="clearfix">
					{{ Form::text ('lastname', isset($user->lastname) ? $user->lastname : '') }}
				</div>
			</div>
		</div>


		<div class="space-2"></div> 

		<div class="form-group">
			<label class="control-label required col-sm-4 " for="username"> Username </label>

			<div class="col-sm-8 form-group float-label-control ">
				<div class="clearfix">
					{{ Form::text ('username', isset($user->username) ? $user->username : '') }}
					{{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

		<div class="space-2"></div> 

		<div class="form-group">
			<label class="control-label required col-sm-4 " for="email">Email</label>

			<div class="col-sm-8 form-group float-label-control "> 
				<div class="clearfix">
					{{ Form::text ('email', isset($user->email) ? $user->email : '')}}
					{{ $errors->first('email','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

	</div>
	<div  class="col-lg-1"></div>

	<div  class="col-lg-1">

		<div class="form-group">


			<div class="col-sm-12">
				<div class="clearfix">

					

					<?php

					if( $user->active == '1')
						$glow = "green-glow";
					elseif( $user->active == '0')
						$glow = "orange-glow";
					else
						$glow = "red-glow";

					?>


					<span class="profile-picture img-rounded  {{$glow}} ">
						@if( $user->logo_path)

						<img class="img-responsive img-rounded  " id="Company Logo" src="/files/logo_path/{{$user->id}}" alt="logo" width="220" >

						@else

						



						@if($user->group == "Admin")
						<img class=" img-responsive img-rounded" src="/img/default/1.png" alt="logo"  width="220" >
						@elseif($user->group == "Product")
						<img class=" img-responsive img-rounded" src="/img/default/8.png" alt="logo"  width="220" >
						@elseif($user->group == "Executive")
						<img class=" img-responsive img-rounded" src="/img/default/7.png" alt="logo"  width="220" >
						@elseif($user->group == "Accounting")
						<img class=" img-responsive img-rounded" src="/img/default/2.png" alt="logo"  width="220" >
						@elseif($user->group == "Orders")
						<img class=" img-responsive img-rounded" src="/img/default/11.png" alt="logo"  width="220" >
						@else
						<img class=" img-responsive img-rounded" src="/img/default/12.png" alt="logo"  width="220" >
						@endif

						



						@endif
					</span>



					{{ Form::file ('logo_path', array('id'=>'id-input-file-1'))}} 

				</div>
			</div>
		</div>

	</div>



</div>







<div class="hr hr-32 dotted"></div> 

<div class="center">
	<a class="red  " data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete User </a> <br><br>
	<a class="blue  btn-lg  btn btn-default" href="/users/{{$user->id}}"> Cancel </a>
	
	{{ Form::hidden('$id', $user->id)}}
	{{ Form::submit ('Done',array('class'=> 'btn-lg btn btn-outline btn-info'))}}

</div>
<div class="hr hr-32 dotted"></div> 

{{ Form::close()}}

<br><br><br><br><br><br><br><br><br><br><br><br>








<!-- Modal_____________________________________________________________________________________________________________________________ -->

<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	<div class="col-lg-5"></div>

	<div class=" text-center col-lg-2">

		{{ Form::model($user,array('route' => array('users.destroy', $user->id),'method' => 'DELETE', 'files' => true)) }}

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		{{ Form::submit ('Delete User',array('class'=> 'btn btn-danger btn-lg btn-block'))}}<br><br>


		<button type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br> 

		{{ Form::hidden('$id', $user->id)}}
		{{ Form::close()}}



	</div>
</div>
<!-- /Modal_____________________________________________________________________________________________________________________________ -->






@stop






