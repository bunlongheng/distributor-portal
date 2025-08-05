@extends('layouts.main')

@section('content')
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<style type="text/css">
	#logo{
		border: 2px solid silver;
	}
	test {
		position: relative;
	}
	
	
</style>




<!-- Header_________________________________________________________________________  -->
<div class="page-content-area">
	<div class="page-header">
		<h1 class="green">
			Bioss Users
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Show
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->




<?php 

$distributor = $user->distributor()->first(); 
$app_path = app_path();

?>



@if (Auth::user()->type == 'Admin')
	<a href="{{ URL::to('users/'.$user->id.'/edit') }}" type="button" class="btn btn-primary btn-sm " title="Edit">
		Edit
	</a> 
	<a href="/users/{{$user->id}}/send_invitation" type="button" class="btn btn-success btn-sm ">
		Resend Invite
	</a> 
@endif
@if (Auth::user()->id == $user->id)
	<a href="/account/change-password" type="button" class="btn btn-warning btn-sm">
		Change Password
	</a>
@endif

<br><br><br>


<div class=" col-lg-2" >

	<div style="text-align:center">
		<!-- Logo -->
		@if( $user->logo_path)

		<img class=" img-rounded" style="text-align:center;" src="/files/logo_path/{{$user->id}}" alt="logo" width="100" >

		@else

		

		@if($user->group == "Admin")
		<img class="img-rounded" src="/img/default/1.png" alt="logo"  width="100" style="text-align:center;">
		@elseif($user->group == "Product")
		<img class="img-rounded" src="/img/default/8.png" alt="logo"  width="100" style="text-align:center;">
		@elseif($user->group == "Executive")
		<img class="img-rounded" src="/img/default/7.png" alt="logo"  width="100" style="text-align:center;">
		@elseif($user->group == "Accounting")
		<img class="img-rounded" src="/img/default/2.png" alt="logo"  width="100" style="text-align:center;">
		@elseif($user->group == "Orders")
		<img class="img-rounded" src="/img/default/11.png" alt="logo"  width="100" style="text-align:center;">
		@else
		<img class="img-rounded" src="/img/default/12.png" alt="logo"  width="100" style="text-align:center;">
		@endif

		@endif

	</div>

	<br>


	<div class="profile-info-row ">
		<div class="profile-info-name"> Name </div>

		<div class="profile-info-value">
			<span>{{ $user->firstname }} {{ $user->lastname }} <!-- Status -->
				@if ( $user->active == 1) <td width="100"  ><i title="Active" class="ace-icon fa fa-circle light-green"></i></td>
				@elseif ( $user->active == 0) <td width="100"  ><i title="Pending" class="ace-icon fa fa-circle orange"></i></td>
				@else
				<td width="100"  ><i title="Disable" class="ace-icon fa fa-circle-o silver"></i></td>
				@endif </span>
			</div>
		</div>



		<div class="profile-info-row">
			<div class="profile-info-name"> Username </div>

			<div class="profile-info-value">
				<span>{{ $user->username }}</span>
			</div>
		</div>




		<div class="profile-info-row">
			<div class="profile-info-name"> Email </div>

			<div class="profile-info-value">
				<span>{{ $user->email }}</span>
			</div>
		</div>

		<div class="profile-info-row">
			<div class="profile-info-name"> Group </div>

			<div class="profile-info-value">
				<span>{{ $user->group }}</span>
			</div>
		</div>


	</div>






	@stop



