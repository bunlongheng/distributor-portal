<h4 class="widget-title grey center"><!-- <i class="blue icon-ticket"></i> --> Billing</h4>
<br>
<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class="control-label col-sm-5 required" for="adline1_billing">Address Line 1 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('adline1_billing', ''); }}
			{{ $errors->first('adline1_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="adline2_billing">Address Line 2 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control">
			{{ Form::text('adline2_billing', ''); }}
			{{ $errors->first('adline2_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="city_billing"> City </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('city_billing', ''); }}
			{{ $errors->first('city_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="state_billing">State/Province </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control">
			{{ Form::text('state_billing', ''); }}
			{{ $errors->first('state_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="postcode_billing">ZIP/Postal Code </label>
	<div class="col-sm-7">
		<div class="input-group">
			<div class="form-group float-label-control">
				{{ Form::text('postcode_billing', ''); }}
			</div>
			{{ $errors->first('postcode_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 required " for="post_code">Country </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('country_billing', '',  array('id' => 'autocomplete_2' )); }}
			{{ $errors->first('country_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
		<i id="selection_2" class="col-sm-5"> </i>
	</div>
</div>