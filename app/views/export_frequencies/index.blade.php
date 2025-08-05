@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/

</style>

<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Export Frequencies
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

<div class="btn-group ">
	<a href="{{ URL::to('export_frequencies/create') }}" class="btn btn-sm btn-primary "> <span class="glyphicon glyphicon-plus"></span> Export Frequency </a>
</div>

<div class="widget-box transparent">
	<div class="widget-body">
		<div class="widget-main no-padding col-sm-5">
			<table class="table">
				<thead class="thin-border-bottom">
					<th>#</th>
					<th>Name</th>
					<th>Edit</th>
				</thead>
				<tbody>
				<?php $x = 0; ?> 
				@foreach (ExportFrequency::all() as $export_frequency)
					<tr>
						<?php $x = $x+1; ?> 
						<td>{{ $x }}</td>
						<td>{{ $export_frequency->name }}</td>
						<td><a href="{{ URL::to('export_frequencies/'.$export_frequency->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">Edit</a></td>
					</tr> 
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop