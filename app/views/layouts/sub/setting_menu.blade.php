<li class="light-green">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<span style="font-size:1.9em"><i class="fa fa-bars"></i></span>
	</a>
	<ul  id="navbar-grey_" class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
		<li>
			<a href="{{ URL::to('/users/')}}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-user light-green wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Bioss Users </span>
			</a>
			<b class="arrow"></b>
		</li>	

		<li>
			<a href="{{ URL::to('activity') }}" tabindex="-1">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-heartbeat blue wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Activity </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('export_types') }}" tabindex="-1">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-bar-chart-o purple wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Export Types </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('tiers') }}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon glyphicon glyphicon-star yellow wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Tiers </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('countries') }}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-flag light-blue wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Countries </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('continents') }}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-globe pink2 wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Continents </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('marketing_materials_categories') }}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-bars lime wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Marketing Material Categories </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li>
			<a href="{{ URL::to('export_frequencies') }}">
				<div style="width:13px; float:left;">
					<span class=""><i class=" menu-icon fa fa-files-o orange wobble-bottom"></i></span>
				</div>
				<span class="menu-text pop" style="margin-left:6px;"> Export Frequencies </span>
			</a>
			<b class="arrow"></b>
		</li>

	</ul>
</li>
