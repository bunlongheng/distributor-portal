<div class="modal fade" id="active_list" >
	<div class=" col-lg-4"> </div>
	<div class=" col-lg-4">

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

					$active_user_distributors = User::where('type','=','Distributor')->where('active','=', 1)->orderBy('last_logged_in','desc')->get();

					?>

					@foreach( $active_user_distributors as $user) 

					<?php 

					$distributor = $user->distributor()->first();
					
					?>

				

					<div class="po-markup">
						

						
							<a class="po-link pull-left" href="/distributors/{{{ $distributor->id or '' }}}">{{{ $distributor->company_name or '' }}}</a>
							@if( $user->logo_path)
							<img class="pull-right" id="Company Logo" src="/files/logo_path/{{$user->id}}" alt="logo" height="30px" width="80px" >
							@else
							<img class="pull-right" id="Default Logo" src="/img/default.PNG" alt="logo" width="80px" >
							@endif

			

						

						<div class="po-content hidden">
							<div class="po-title">
								<img src="/files/logo_path/{{$user->id}}" alt="Logo" width="250"/>
								<h4 class="lighter"  style="text-align:center;">{{{ $distributor->company_name or '' }}}</h4>

								

							</div> 

							<div class="po-body">
								<p>
									<ul> 

										<li>Logged in <b class="cool-blue">{{{ $user->logged_in_count or '' }}}</b> time(s)</li>
										<li>CD <b class="cool-blue">{{{ $user->cd_count or '' }}}</b> time(s) </li>
										<li>MMD <b class="cool-blue">{{{ $user->mmd_count or '' }}}</b> time(s) </li>
									</ul>
								</p>


							</div>
						</div>  
					</div>


					

					<br>

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

