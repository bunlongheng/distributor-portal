@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/
	#logo{
		border: black 1px solid;
		padding: 3px;

	}

	.right-corner {
		position:fixed;
		bottom:0;
		right:0:
	}

</style>

<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Countries 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->



<!-- <div class="row">

	<div class="col-sm-2 ">
		<div class="btn-group ">
			<a href="{{ URL::to('countries/create') }}" class="btn btn-sm btn-primary "> <span class="glyphicon glyphicon-plus"></span> Country</a>

		</div>
	</div>
</div>
 -->

<div class="row">
	<div class="col-sm-8">
		<div class="widget-box transparent">


			<div class="widget-body">
				<div class="widget-main no-padding">
					<table class="table">

						<thead class="thin-border-bottom">

							<th>#</th>
							<th>Name</th>
							<th>Country Code</th>
							<th>Continent Code</th>
							<th>Logo</th>
							<th>Weight</th>
							<th>Edit</th>
							

						</thead>

						<tbody>

							<tr>
								@foreach (Country::all() as $country)

								<td>{{ $country->id }}</td>
								
								<td>{{ HTML::link('countries/' . $country->id, $country->name) }}</td>
								<td>{{ $country->code }}</td>
								<td>{{ $country->continent_code }}</td>

								<!-- <td><img id="logo"  src="/img/flags_2/{{ $country->name }}-Flag-64.png" alt="logo" class="img-circle" height="42px" width="42px"></td>
							-->

							<td>
							<img src="/img/flags_3/flags/48/{{ $country->name }}.png">
							</td>

							<td>{{ $country->weight }}</td>

							<td><a href="{{ URL::to('countries/'.$country->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">Edit</a></td>


						</tr> 


						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="col-sm-1"></div><div class="col-sm-3"> <img class="right-corner"  src="/img/gif/globe.gif" alt="map"  ></div>

@stop















