<li class="grey">
	<a data-toggle="dropdown" href="#" class="dropdown-toggle">

		@if (Auth::check())
			@if(Auth::user()->type == 'Distributor')
				<img height="48px" src="/files/logo_path/{{Auth::user()->distObj()->id}}" alt="User's Photo" />
			@elseif( Auth::user()->logo_path)
			 <img class="nav-user-photo  " id="Company Logo" src="/files/logo_path/{{Auth::user()->id}}" alt="User's Photo" >
			@else
				@if(Auth::user()->group == "Admin")
					<img class=" nav-user-photo" src="/img/default/1.png" alt="User's Photo"  >
				@elseif(Auth::user()->group == "Product")
					<img class=" nav-user-photo" src="/img/default/8.png" alt="User's Photo"  >
				@elseif(Auth::user()->group == "Executive")
					<img class=" nav-user-photo" src="/img/default/7.png" alt="User's Photo"  >
				@elseif(Auth::user()->group == "Accounting")
					<img class=" nav-user-photo" src="/img/default/2.png" alt="User's Photo"  >
				@elseif(Auth::user()->group == "Orders")
					<img class=" nav-user-photo" src="/img/default/11.png" alt="User's Photo"  >
				@else
					<img class=" nav-user-photo" src="/img/default/12.png" alt="User's Photo"  >
				@endif
			@endif
		@endif

		<span class="user-info">
			<small> Welcome,</small>
			@if (Auth::check())
				@if(Auth::user()->type !== 'Distributor')
					{{  Auth::user()->firstname }}
				@else
					{{  Auth::user()->distObj()->company_name }}
				@endif
			@endif
		</span>
		<i class="ace-icon fa fa-caret-down"></i>
	</a>
	<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-caret dropdown-close">
		@if (Auth::check())
			@if(Auth::user()->type == 'Distributor')
				<li>
					<a href="/distributors/{{ Auth::user()->distObj()->id }}" >
						<i class="ace-icon fa fa-user"></i>
						My Account
					</a>
				</li>
			@elseif (Auth::user()->type == 'Bioss' || Auth::user()->type == 'Admin')
				<li>
					<a href="/users/{{ Auth::user()->id }}">
						<i class="ace-icon fa fa-user"></i>
						My Account
					</a>
				</li>
			@endif
			<li class="divider"></li>
		@endif

		<li>
			<a href="{{ URL::route('account-sign-out') }}">
				<i class="ace-icon fa fa-power-off"></i>
				Logout
			</a>
		</li>
	</ul>
</li>
