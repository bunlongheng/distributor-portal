<h4 class="widget-title grey center">Shipping</h4>
<h5 class="widget-title grey center">
	<input id="badge" type="button" value="Same as Billing " name="billingAsShipping" onclick="fill_shipping(this.form)">
</h5>
<script type="text/javascript">
	function fill_shipping(f) {
		
		f.adline1_shipping.value = f.adline1_billing.value;
		f.adline2_shipping.value = f.adline2_billing.value;
		f.city_shipping.value = f.city_billing.value;
		f.state_shipping.value = f.state_billing.value;
		f.postcode_shipping.value = f.postcode_billing.value;
		f.country_shipping.value = f.country_billing.value;
		
	}
</script>
<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class="control-label col-sm-5 required " for="adline1_shipping">Address Line 1 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control">
			{{ Form::text('adline1_shipping', ''); }}
			{{ $errors->first('adline1_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="adline2_shipping">Address Line 2 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('adline2_shipping', ''); }}
			{{ $errors->first('adline2_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="city_shipping"> City </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('city_shipping', ''); }}
			{{ $errors->first('city_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="state_shipping">State/Province</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('state_shipping', ''); }}
			{{ $errors->first('state_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="postcode_shipping">ZIP/Postal Code</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('postcode_shipping', ''); }}
			{{ $errors->first('postcode_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>
<div class="form-group">
	<label class="control-label col-sm-5 required " for="country_shipping">Country:</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('country_shipping', '',  array('id' => 'autocomplete_3' )); }}
			{{ $errors->first('country_shipping','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
		<i id="selection_3" class="col-sm-5"> </i>
	</div>
</div>