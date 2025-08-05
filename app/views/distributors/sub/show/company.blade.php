<div class="form-group ">
	<label class="col-sm-4 control-label">Logo</label>
	<div class="col-sm-8 ">
		<div class="clearfix">

			<?php

			if( $distributor->active == '1')
				$glow = "green-glow";
			elseif( $distributor->active == '0')
				$glow = "orange-glow";
			else
				$glow = "red-glow";

			?>
			<span class="profile-picture img-rounded  {{$glow}} ">
				@if( $distributor->logo_path)
				<a href="http://{{ str_replace("http://","",$distributor->url); }}" target="_blank" >
					<img class="img-responsive img-rounded  " id="Company Logo" src="/files/logo_path/{{$distributor->id}}?q={{microtime()}}" alt="logo" >
				</a>
				@else
				<a href="http://{{ str_replace("http://","",$distributor->url); }}" target="_blank" >
					<img class="img-responsive img-rounded " id="Default Logo" src="/img/default.PNG" alt="logo" >
				</a>
				@endif
			</span>

		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label ">Company </label>
	<div class="col-sm-8  ">
		<span class="show-data">


			<span >{{{ $distributor->company_name or ''}}}</span>


		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label ">URL </label>
	<div class="col-sm-8  ">
		<span class="show-data">
			<a href="http://{{ str_replace("http://","",$distributor->url); }}" target="_blank" >
				@if (strlen($distributor->url) > 30)
					{{{ substr($distributor->url,0,30) }}}...
				@else
					{{{ $distributor->url }}}
				@endif
			</a>
		</span>
	</div>
</div>

<div class="form-group">
	<label class=" col-sm-4 control-label " >Phone</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->phone_public or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " >Email</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->email_public or '' }}}

		</span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label ">Country </label>
	<div class="col-sm-8 ">
		<span class="show-data">
			{{{ $distributor->country->name or ''}}} <img src="/img/flags_3/flags/48/{{ $distributor->country->name }}.png  " width="38px">
		</span>
	</div>
</div>

