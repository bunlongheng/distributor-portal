<div class="modal fade" id="bioss_active_list" >
	<div class=" col-lg-5"> </div>
	<div class=" col-lg-2">

		<br><br><br><br><br>



		<div class="modal-content">
			<div class="modal-header" data-target="#modal-step-contents">
				<button class="btn btn-danger btn-xs btn-white pull-right" data-dismiss="modal">
					x

				</button>
				<h1 class="lighter">Active</h1>
				
			</div>

			<div class="modal-body step-content" id="modal-step-contents">
				
				<td >

					<?php 

					$active_user_bioss = User::where('type','!=','Distributor')->where('active','=', 1)->orderBy('group','asc')->get(); ?>

					@foreach( $active_user_bioss as $user)

					<div class="po-markup">
						<br>

						<a class="po-link" href="/users/{{$user->id}}">{{{ $user->username or '' }}}</a>
						
						@if( $user->logo_path)

						<img class=" img-circle pull-right "  src="/files/logo_path/{{$user->id}}" alt="logo" width="20" >

						@else

						@if($user->group == "Admin")
						<img class=" img-circle pull-right" src="/img/default/1.png" alt="logo"  width="20" >
						@elseif($user->group == "Product")
						<img class=" img-circle pull-right" src="/img/default/8.png" alt="logo"  width="20" >
						@elseif($user->group == "Executive")
						<img class=" img-circle pull-right" src="/img/default/7.png" alt="logo"  width="20" >
						@elseif($user->group == "Accounting")
						<img class=" img-circle pull-right" src="/img/default/2.png" alt="logo"  width="20" >
						@elseif($user->group == "Orders")
						<img class=" img-circle pull-right" src="/img/default/11.png" alt="logo"  width="20" >
						@else
						<img class=" img-circle pull-right" src="/img/default/12.png" alt="logo"  width="20" >
						@endif

						@endif
						




						<div class="po-content hidden">
							<div class="po-title">
								
								@if( $user->logo_path)

								<img class=" img-circle pull-right "  src="/files/logo_path/{{$user->id}}" alt="logo" width="80" >

								@else

								@if($user->group == "Admin")
								<img class=" img-circle pull-right" src="/img/default/1.png" alt="logo"  width="80" >
								@elseif($user->group == "Product")
								<img class=" img-circle pull-right" src="/img/default/8.png" alt="logo"  width="80" >
								@elseif($user->group == "Executive")
								<img class=" img-circle pull-right" src="/img/default/7.png" alt="logo"  width="80" >
								@elseif($user->group == "Accounting")
								<img class=" img-circle pull-right" src="/img/default/2.png" alt="logo"  width="80" >
								@elseif($user->group == "Orders")
								<img class=" img-circle pull-right" src="/img/default/11.png" alt="logo"  width="80" >
								@else
								<img class=" img-circle pull-right" src="/img/default/12.png" alt="logo"  width="80" >
								@endif

								@endif




								<h4 class="lighter"  style="text-align:center;">{{{ $user->firstname or '' }}} {{{ $user->lastname or '' }}}</h4>

							</div> 

							<div class="po-body">
								<p>
									<ul> 
										
										<li>Logged in : <b class="cool-blue">{{ $user->logged_in_count }}</b> time(s)</li>
										<li>Sent Invitation : <b class="cool-blue">{{{ $user->send_invitation or '' }}}</b> time(s) </li>
									</ul>
								</p>


							</div>
						</div>  
					</div>

					<hr>


					@endforeach

				</td>
				


			</div>

			<div class="modal-footer wizard-actions">

				<button class="btn btn-danger btn-sm btn-next" data-dismiss="modal">
					Close

				</button>
			</div>
		</div>
	</div>
</div>

