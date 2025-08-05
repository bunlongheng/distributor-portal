			@if ( $continent->code == 'EU')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-info">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-{{$continent->code}}">
							@include('distributors.sub.index.th')
						</div>
						<p >
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>


			@elseif ($continent->code == 'AS')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-warning">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-AS">
							@include('distributors.sub.index.th')
						</div>
						<p>
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>

			@elseif ($continent->code == 'NA')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-danger">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-{{$continent->code}}">
							@include('distributors.sub.index.th')
						</div>
						<p>
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>

			@elseif ($continent->code == 'OC')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-primary">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-{{$continent->code}}">
							@include('distributors.sub.index.th')
						</div>
						<p>
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>

			@elseif ($continent->code == 'SA')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-success">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-{{$continent->code}}">
							@include('distributors.sub.index.th')
						</div>
						<p>
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>

			@elseif ($continent->code == 'AF')
			
			<div class="col-xs-12 ctn-box">
				<div class="offer offer-default">
					<div class="shape">
						<div class="shape-text">
							{{ $continent->code}}
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							@include('distributors.sub.index.continent_header')
						</h3>
						<div class="container header-{{$continent->code}}">
							@include('distributors.sub.index.th')
						</div>
						<p>
							@include('distributors.sub.index.country_content')
						</p>
					</div>
				</div>
			</div>

			@endif