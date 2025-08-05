 <h4 class="widget-title grey center"><!-- <i class="blue icon-ticket"></i> --> Order/Sales</h4>

<h6 class="widget-title grey center" >
	<input  id="badge" type="button" value="Same as Main " name="supportAsMain" onclick="fill_support(this.form)" />
</h6>
<script type="text/javascript">
	function fill_support(f) {
	
			f.firstname_support.value = f.firstname_main.value;
			f.lastname_support.value = f.lastname_main.value;
			f.title_support.value = f.title_main.value;
			f.email_support.value = f.email_main.value;
			f.phone_support.value = f.phone_main.value;
		
	}
</script>
<div class="form-group"> <!-- _________________________________________________________________________ -->
	<label class=" col-sm-4 control-label required " for="firstname_support">First Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('firstname_support', isset($support_contact->firstname) ? $support_contact->firstname : '' ); }}
			{{ $errors->first('firstname_support','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="lastname_support"> Last Name </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('lastname_support', isset($support_contact->lastname ) ? $support_contact->lastname  : '' ); }}
			{{ $errors->first('lastname_support','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " for="title_support"> Title </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('title_support', isset($support_contact->title) ? $support_contact->title : '' ); }}
			{{ $errors->first('title_support','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label required " for="email_support"> Email </label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control ">

			{{ Form::text('email_support', isset($support_contact->email ) ? $support_contact->email  : '' ); }}
			{{ $errors->first('email_support','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label  required " for="phone_support">Phone</label>
	<div class="col-sm-8">
		<div class="input-group form-group float-label-control">

			{{ Form::text('phone_support', isset($support_contact->phone ) ? $support_contact->phone  : '' ); }}
			{{ $errors->first('phone_support','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
		</div>
	</div>
</div>