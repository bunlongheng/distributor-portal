<div class="form-group">
	<label class="col-sm-4 control-label required ">Username </label>
	<div class="col-sm-8 form-group float-label-control ">
		<span class="input-icon input-icon-right">

			{{ Form::text('username',  isset($user->username) ? $user->username : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-user green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label required ">Email </label>
	<div class="col-sm-8 form-group float-label-control ">
		<span class="input-icon input-icon-right">

			{{ Form::text('email', isset($user->email ) ? $user->email  : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('email','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-4 control-label required ">Account Status</label>
	<div class="col-sm-8 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			<input id="account_status" name="account_status" type="checkbox" value="true" class="ace ace-switch ace-switch-4">
			<span class="lbl middle"></span>
		</span>
	</div>
</div>




