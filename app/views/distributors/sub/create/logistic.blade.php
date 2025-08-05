<div class="form-group ">
	<label class="col-sm-5 control-label required  " for="payment_method">Payment Method </label>
	
	<div class=" col-sm-7 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-dollar"></i>
			</span>
			 {{Form::select('payment_method', array('Receiver Paid' => 'Receiver Paid', 'Shipper Paid' => 'Shipper Paid'), 'Receiver Paid', array('id' => 'payment_method')); }}
		</div>
	</div>
</div>

<span class="red" name="note" id="note"> Bioss will paid for the shipping cost and bill to receiver. </span>

<div class="form-group ">
	<label id="shiping_carrier_label" class="col-sm-5 control-label required  " for="shipping_carrier">Shipping Carrier </label>
	
	<div class=" col-sm-7 form-group float-label-control">
		<div class="input-group">
			
			 {{Form::select('shipping_carrier', array('FedEx' => 'FedEx', 'DHL' => 'DHL', 'Nippon Express' => 'Nippon Express'), 'FedEx', array('id' => 'shipping_carrier')); }}
		</div>
	</div>
</div>



<div class="form-group">
	<label class="col-sm-5 control-label "> </label>
	<div class="col-sm-7 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			 {{Form::text('shipping_number', '', array('id' => 'shipping_number','placeholder'=>'Carrier Acct#')); }}
			 {{ $errors->first('shipping_number','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			
		</span>
	</div>
</div>







<!-- <label>
	Payment method: <br />
	<select id="payment_method" name="payment_method">
		<option value="1">Receiver Paid</option>
		<option value="2">Shipper Paid</option>
	</select>
</label>

<label>
	Shipping Carrier:
	<select id="shipping_carrier" name="shipping_carrier">
		<option value="1">FedEx</option>
		<option value="2">DHL</option>
	</select><br />

</label>

 	<input type="text" name="shipping_number" id="shipping_number" value="" placeholder="Carrier Acct #" /> -->


 	







