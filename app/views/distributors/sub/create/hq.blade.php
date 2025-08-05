<h4 class="widget-title grey center">Headquaters</h4>
<h5 class="widget-title grey center">
	<input id="badge" type="button" value="Same as Billing "  onclick="fill_hq(this.form)">
</h5>
<script type="text/javascript">
	function fill_hq(f) {
		
		f.adline1_hq.value = f.adline1_billing.value;
		f.adline2_hq.value = f.adline2_billing.value;
		f.city_hq.value = f.city_billing.value;
		f.state_hq.value = f.state_billing.value;
		f.postcode_hq.value = f.postcode_billing.value;
		f.country_hq.value = f.country_billing.value;
		
	}
</script>
<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class="control-label col-sm-5 required " for="adline1_hq">Address Line 1 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control">
			{{ Form::text('adline1_hq', ''); }}
			{{ $errors->first('adline1_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="adline2_hq">Address Line 2 </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('adline2_hq', ''); }}
			{{ $errors->first('adline2_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="city_hq"> City </label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('city_hq', ''); }}
			{{ $errors->first('city_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="state_hq">State/Province</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('state_hq', ''); }}
			{{ $errors->first('state_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>
<div class="form-group">
	<label class="control-label col-sm-5 " for="postcode_hq">ZIP/Postal Code</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('postcode_hq', ''); }}
			{{ $errors->first('postcode_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="space-2"></div>
<div class="form-group">
	<label class="control-label col-sm-5 required " for="country_hq">Country:</label>
	<div class="col-sm-7">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('country_hq', '',  array('id' => 'autocomplete_4' )); }}
			{{ $errors->first('country_hq','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
		<i id="selection_4" class="col-sm-4"> </i>
	</div>
</div>