<h4 class="widget-title grey center">Billing</h4>
<br>
<div class="form-group">
	<label class="control-label col-sm-4 required" for="adline1">Address Line 1 </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('adline1_billing', isset($billing_address->adline1) ? $billing_address->adline1 : '' ); }}
			{{ $errors->first('adline1_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-4 " for="adline2">Address Line 2 </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control">
			{{ Form::text('adline2_billing', isset($billing_address->adline2) ? $billing_address->adline2 : '' ); }}
			{{ $errors->first('adline2_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-4 " for="city"> City: </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('city_billing',isset($billing_address->city) ? $billing_address->city : ''); }}
			{{ $errors->first('city_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-4 " for="state">State/Province</label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control">
			{{ Form::text('state_billing', isset($billing_address->state) ? $billing_address->state : ''); }}
			{{ $errors->first('state_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-4 " for="postcode">ZIP/Postal Code</label>
	<div class="col-sm-8">
		<div class="input-group">
			<div class="form-group float-label-control">
				{{ Form::text('postcode_billing', isset($billing_address->postcode) ? $billing_address->postcode : ''); }}
			</div>
			{{ $errors->first('postcode_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-4 required " for="post_code">Country</label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('country_billing', isset($billing_address->country->name) ? $billing_address->country->name : ''  ,  array('id' => 'autocomplete_2' )); }}
			{{ $errors->first('country_billing','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
		<i id="selection_2" class="col-sm-4"> </i>
	</div>
</div>