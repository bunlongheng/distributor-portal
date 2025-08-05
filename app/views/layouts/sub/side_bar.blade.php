<div id="sidebar" class="sidebar responsive">
	<!-- include('layouts.sub.shortcut') -->
	<ul class="nav nav-list">
		@include('layouts.sub.nav_list')
	  	@if (Auth::user()->type == 'Admin' )  
			@include('layouts.sub.admin_nav_list')
		@endif
	</ul>
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>	
</div>