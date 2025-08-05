<h4 class="widget-title grey"> Main/Business</h4><br><br>
<div class="form-group">
	<label class=" col-sm-12 " for="firstname">First Name </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $main_contact->firstname or ''}}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-12 " for="lastname"> Last Name </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $main_contact->lastname or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-12 " for="title"> Title </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $main_contact->title or '' }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-12 " for="email"> Email </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $main_contact->email or $user->email }}}
			
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-12 " for="phone">Phone</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $main_contact->phone or '' }}}
			
		</span>
	</div>
</div>