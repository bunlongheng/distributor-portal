@extends ('layouts.main')

@section('content')

<link rel="stylesheet" href="/css/root/float_label.css">


<div class="container">
	<div class="row">
		<br><br>


		<div class="col-lg-7">

			<h4 >Password must have minimum of 6 characters</h4><br><br>

			<form class="form-horizontal" role="form" action=" {{ URL::route('account-change-password-post')}}" method="post" >

				<div class="form-group"> 
					<label class="control-label col-sm-4 required" for="old_password">Old Password </label>
					<div class="col-sm-8">
						<div class="input-group form-group float-label-control ">
							{{ Form::password('old_password'); }}
							{{ $errors->first('old_password','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</div>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-sm-4 required" for="password">New Password </label>
					<div class="col-sm-8">
						<div class="input-group form-group float-label-control ">
							{{ Form::password('password'); }}
							{{ $errors->first('password','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</div>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-sm-4 required" for="password_again">New Password Again </label>
					<div class="col-sm-8">
						<div class="input-group form-group float-label-control ">
							{{ Form::password('password_again'); }}
							{{ $errors->first('password_again','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</div>
					</div>
				</div>

				

				<div class="hr hr-32 dotted"></div>
				<div class="center">
					@if(Auth::user()->type == "Bioss")
					<a class="blue btn-lg btn btn-default" href="/distributors/"> Cancel </a>
					@else
					<a class="blue btn-lg btn btn-default" href="/dashboard"> Cancel </a>
					@endif 
					

					{{ Form::submit ('Confirm',array('class'=> 'btn btn-outline btn-lg btn-info', 'data-title'=>'Upload Company Logo '))}}
					<div class="hr hr-32 dotted"></div>
				</div>
				{{ Form::token() }}
				{{ Form::close()}}

			</div>
			<div class="col-lg-4">

			</div>
		</div>
	</div>



	





	@stop





