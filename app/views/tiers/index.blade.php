@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/

</style>

<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Tiers 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

<div class="btn-group ">
	<a href="{{ URL::to('tiers/create') }}" class="btn btn-sm btn-primary "> <span class="glyphicon glyphicon-plus"></span> Tier</a>
</div>

<div class="widget-box transparent">
	<div class="widget-body">
		<div class="widget-main no-padding col-sm-5">
			<table class="table">
				<thead class="thin-border-bottom">
					<th>Level</th>
					<th>Edit</th>
				</thead>
				<tbody>
				@foreach (Tier::all() as $tier)
					<tr>
						<td>{{ HTML::link('tiers/' . $tier->id, $tier->level) }}</td>
						<td><a href="{{ URL::to('tiers/'.$tier->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">Edit</a></td>
					</tr> 
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-sm-8"></div>
<div class="col-sm-3"> <img class="right-corner"  src="/img/gif/tier3.jpg" alt="map"  ></div>

@stop
