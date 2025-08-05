<div class="form-group">
	<label class="col-sm-3 control-label required  ">Username </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">

			{{ Form::text('username', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-user green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label required  ">Email </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">

			{{ Form::text('email', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('email','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>


