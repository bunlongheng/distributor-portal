
<h4 class="widget-title grey center"><!-- <i class="icon-profile grey"></i> --> Main/Business</h4>
<br>
<div class="form-group">
	<label class=" col-sm-4 control-label required" for="firstname_main">First Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control">

			{{ Form::text('firstname_main', '', array()); }}
			{{ $errors->first('firstname_main','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}

		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="lastname_main"> Last Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('lastname_main', '', array()); }}
			{{ $errors->first('lastname_main','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " for="title"> Title </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('title_main', '', array()); }}
			{{ $errors->first('title_main','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="email_main"> Email </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('email_main','', array()); }}
			{{ $errors->first('email_main','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="phone_main">Phone</label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('phone_main', '', array()); }}
			{{ $errors->first('phone_main','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
