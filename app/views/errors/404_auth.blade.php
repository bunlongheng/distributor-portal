
@extends('layouts.main')

@section('content')

<div class="page-content-area">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

			<div class="error-container">
				<div class="well">
					<h1 class="grey lighter smaller">
						<span class="blue bigger-125">
							<i class="ace-icon fa fa-sitemap"></i>
							404
						</span>
						Page Not Found
					</h1>

					<hr />
					<h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

					<div>


						<div class="space"></div>
						<h4 class="smaller">Did you try ?</h4>

						<ul class="list-unstyled spaced inline bigger-110 margin-15">
							<li>
								<i class="ace-icon fa fa-hand-o-right blue"></i>
								Re-check the url for typos
							</li>

						</ul>
					</div>

					<hr />
					<div class="space"></div>

					<div class="center">
						<a href="javascript:history.back()" class="btn btn-grey">
							<i class="ace-icon fa fa-arrow-left"></i>
							Go Back
						</a>

						<a href="/" class="btn btn-primary">
							<i class="ace-icon fa fa-home"></i>
							Home
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@stop
