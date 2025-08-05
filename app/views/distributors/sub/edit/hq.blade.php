<h4 class="widget-title grey center">Headquaters</h4>
<h5 class="widget-title grey center">
	<input id="badge" type="button" value="Same as Billing " name="billingAsShipping" onclick="fill_hq(this.form)">
</h5>


<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class="control-label col-sm-5 required " for="adline1_hq">Address Line 1 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control">
			{{ Form::text('adline1_hq', isset($hq_address->adline1) ? $hq_address->adline1 : '' ); }}
			{{ $errors->first('adline1_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="adline2_hq">Address Line 2 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('adline2_hq', isset($hq_address->adline2) ? $hq_address->adline2 : '' ); }}
			{{ $errors->first('adline2_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="city_hq"> City </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('city_hq', isset($hq_address->city) ? $hq_address->city : ''  ); }}
			{{ $errors->first('city_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="state_hq">State/Province</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('state_hq', isset($hq_address->state) ? $hq_address->state : ''  ); }}
			{{ $errors->first('state_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="postcode_hq">ZIP/Postal Code</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('postcode_hq', isset($hq_address->postcode) ? $hq_address->postcode : '' ); }}
			{{ $errors->first('postcode_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>



<div class="form-group">
	<label class="control-label col-sm-5  required " for="country_hq">Country:</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('country_hq',  isset($hq_address->country->name) ? $hq_address->country->name : '' ,  array('id' => 'autocomplete_4' )); }}
			{{ $errors->first('country_hq','<span class="label label-danger arrowed">:message</span>') }}
		</div>
		<i id="selection_4" class="col-sm-5"> </i>
	</div>
</div>


<script type="text/javascript">
	function fill_hq(f) {
		
		f.adline1_hq.value  = f.adline1_billing.value;
		f.adline2_hq.value  = f.adline2_billing.value;
		f.city_hq.value     = f.city_billing.value;
		f.state_hq.value    = f.state_billing.value;
		f.postcode_hq.value = f.postcode_billing.value;
		f.country_hq.value  = f.country_billing.value;
		
	}
</script>
