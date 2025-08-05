@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/

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
			Continents
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

<div class="btn-group ">
	<a href="{{ URL::to('continents/create') }}" class="btn btn-sm btn-primary "> <span class="glyphicon glyphicon-plus"></span> Continent</a>
</div>

<div class="widget-box transparent">
	<div class="widget-body">
		<div class="widget-main no-padding col-sm-5">
			<table class="table table-hover">
				<thead class="thin-border-bottom">
					<th>Name</th>
					<th>Code</th>
					<th>Weight</th>
				</thead>
				<tbody>
				@foreach (Continent::all() as $continent)
					<tr>	
						<td>{{ $continent->name }}</td>
						<td>{{  $continent->code }}</td>
						<td>{{  $continent->weight }}</td>
						<!-- <td><a href="{{ URL::to('continents/'.$continent->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">Edit</a></td> -->
					</tr> 
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-sm-8"></div>
<div class="col-sm-3"> <img class="right-corner"  src="/img/gif/map.gif" alt="map"  ></div>

@stop