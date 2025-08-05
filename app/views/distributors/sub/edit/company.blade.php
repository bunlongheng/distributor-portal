



<div class="form-group">
	<label class="col-sm-3 control-label ">Logo</label>
	<div class="col-sm-8 ">
		<div class="clearfix">
			<span class="profile-picture img-rounded">

				@if( $distributor->logo_path)
				<img class="img-responsive img-rounded company-logo" id="Company Logo" src="/files/logo_path/{{$distributor->id}}?q={{microtime()}}" alt="logo" >
				@else
				<img class="img-responsive img-rounded " id="Default Logo" src="/img/default.PNG?q={{microtime()}}" alt="logo" >
				@endif
			</span>
			{{ Form::file ('logo_path', array('id'=>'id-input-file-1'))}}
			{{ $errors->first('logo_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label required ">Company </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('company_name',  isset($distributor->company_name) ? $distributor->company_name : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('company_name','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label required ">Phone </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('phone_public',  isset($distributor->phone_public) ? $distributor->phone_public : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('phone_public','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label required ">Email </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('email_public',  isset($distributor->email_public) ? $distributor->email_public : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('email_public','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}

		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label ">URL </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('url', isset($distributor->url ) ? $distributor->url  : '' , array('id'=>'form-field-icon-2')); }}
			{{ $errors->first('url','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-3 control-label required ">Country </label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('country',  isset($distributor->country->name) ? $distributor->country->name : '', array('class' => '', 'id' => 'autocomplete')); }}
			{{ $errors->first('country','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<i id="selection" class="col-sm-4"> </i>
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>