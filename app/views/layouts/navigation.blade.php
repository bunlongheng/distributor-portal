
<div class="navbar gray">
	
	<div class="navbar-container">
		
		@include('layouts.sub.mobile_toggle')
		@include('layouts.sub.navbar_brand')
		
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				{{--
				@if (Auth::check() && Auth::user()->type == 'Admin')
					@include('layouts.sub.setting_menu')
				@endif
				--}}
				@include('layouts.sub.user_menu')
			</ul>
		</div>
	</div>
</div>

