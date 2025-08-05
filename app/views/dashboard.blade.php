@extends('layouts.main')
@section('content')

@include('dashboard.style')



@if (Auth::user()->type === 'Admin' OR Auth::user()->type === 'Bioss' )

	<div class="col-md-4">
		
		<!-- Distributors  -->
		<a href="{{ URL::to('distributors/list_view') }}">
			<div class="blockquote-box blockquote-warning clearfix">
				<div class="square pull-left">
					<span class="fa fa-home glyphicon-lg">

					</span>
				</div>
				<h4>Distributors </h4>
			</a>
			<p>Create/Read/Update/Delete distributors</p>
		</div>

		@include('dashboard.list')
	</div>



	<div class="col-md-1"></div>

@elseif (Auth::user()->type === 'Distributor')

	
	{{--Not OEM--}}
	@if( Auth::user()->distObj()->type !== "OEM")


		@include('dashboard.link')


		<div class="outer">
			<div class="header-2">


				{{-- List--}}
				<div class="col-md-6">

					@include('dashboard.list')

				</div>


				{{--Description--}}
				<div class="col-md-4">

					@include('dashboard.description')

				</div>



			</div>
		</div>


	{{--ELSE--}}
	@else


	@include('dashboard.link')

	<div class="outer">
		<div class="header-2">



			<div class="col-md-6">

				<!-- Catalog Download  -->
				<a href="{{ URL::to('catalog_downloads/') }}">
					<div class="blockquote-box blockquote-success clearfix">
						<div class="square pull-left">
							<span class="fa fa-cloud-download glyphicon-lg glyphicon-lg">

							</span>
						</div>
						<h4>
							Catalog Downloads
						</h4>
					</a>
					<p>
						Download our latest catalogs
					</p>
				</div>
			</div>


			<div class="col-md-4">

				@include('dashboard.description')

			</div>


		</div>
	</div>

	@endif

@endif
@stop


