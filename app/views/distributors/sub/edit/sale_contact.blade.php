<h4 class="widget-title grey center"><!-- <i class="blue icon-ticket"></i> --> Billing/Accounting</h4>

<h6 class="widget-title grey center" >
	<input  id="badge" type="button" value="Same as Main " name="saleAsMain" onclick="fill_sale(this.form)" />

</h6>
<script type="text/javascript">
	function fill_sale(f) {
		
			f.firstname_sale.value = f.firstname_main.value;
			f.lastname_sale.value  = f.lastname_main.value;
			f.title_sale.value     = f.title_main.value;
			f.email_sale.value     = f.email_main.value;
			f.phone_sale.value     = f.phone_main.value;
		
	}
</script>

<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class=" col-sm-4 control-label required " for="firstname_sale">First Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('firstname_sale', isset($sale_contact->firstname) ? $sale_contact->firstname : ''); }}
			{{ $errors->first('firstname_sale','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required  " for="lastname_sale"> Last Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('lastname_sale',isset($sale_contact->lastname ) ? $sale_contact->lastname  : ''); }}
			{{ $errors->first('lastname_sale','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " for="title_sale"> Title </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('title_sale', isset($sale_contact->title) ? $sale_contact->title : '' ); }}
			{{ $errors->first('title_sale','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="email_sale"> Email </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('email_sale', isset($sale_contact->email ) ? $sale_contact->email  : '' ); }}
			{{ $errors->first('email_sale','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="phone_sale">Phone</label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">
			{{ Form::text('phone_sale', isset($sale_contact->phone ) ? $sale_contact->phone  : '' ); }}
			{{ $errors->first('phone_sale','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>