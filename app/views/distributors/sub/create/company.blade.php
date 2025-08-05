





<div class="form-group">
	<label class="col-sm-3 control-label ">Logo</label>
	<div class="col-sm-8 ">
		<div class="clearfix">
			{{ Form::file ('logo_path', array('id'=>'id-input-file-3'))}}
			{{ $errors->first('logo_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 required control-label ">Company </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('company_name', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('company_name','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 required control-label ">Phone </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('phone_public', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('phone_public','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 required control-label ">Email </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('email_public', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('email_public','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label ">URL </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('url', '', array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('url','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 required control-label ">Country </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('country', '', array('class' => '', 'id' => 'autocomplete')); }}
			{{ $errors->first('country','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<i id="selection" class="col-sm-4"> </i>
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>