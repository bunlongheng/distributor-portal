<h4 class="widget-title grey"> Billing</h4><br><br>
<div class="form-group">
	<label class=" col-sm-5   ">Address Line 1 </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->adline1 or ''}}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-5   " > Address Line 2 </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->adline2 or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-5   "> City </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->city or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-5   " > State/Province </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->state or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-5   ">ZIP/Postal Code </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->postcode or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-5   ">Country </label>
	<div class="col-sm-7">
		<span class="show-data">
			{{{ $billing_address->country->name or '' }}}
			
		</span>
	</div>
</div>

<div class="form-group">
	<label class=" col-sm-5   "> Location </label>
	<div class="col-sm-7">
		<span class="show-data">
			
			@if(isset($billing_address) && !is_null($billing_address))
			<span>
				{{ $billing_address->adline1 }}, {{ $billing_address->adline2}}
				<br />
				{{ $billing_address->city }}, {{ $billing_address->state }} {{ $billing_address->postcode }}
				<br />
				{{ $billing_address->country->name }}
			</span>
			<img src="/img/flags_3/flags/48/{{{  $billing_address->country->name or 'Country' }}}.png  " width="15px" height="15px">
			@endif

		</span>
	</div>
</div>




