<div class="form-group">
	<label class=" col-sm-4 control-label "> Payment Method </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->payment_method or ''}}}

		</span>
	</div>
</div>

<div class="form-group">
	<label class=" col-sm-4 control-label "> Shipping Carrier </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->shipping_carrier or ''}}}

		</span>
	</div>
</div>

<div class="form-group">
	<label class=" col-sm-4 control-label "> Shipping Number </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->shipping_number or ''}}}

		</span>
	</div>
</div>