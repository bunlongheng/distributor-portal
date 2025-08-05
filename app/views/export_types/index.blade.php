
@extends('layouts.main')

@section('content')


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://templateplanet.info/tooltip.js"></script>
<script src="http://templateplanet.info/modal.js"></script>


<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="purple">
			Export Types 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

<div class="btn-group ">
	<a href="{{ URL::to('export_types/create') }}" class="btn btn-sm btn-purple "> <span class="glyphicon glyphicon-plus"></span> ExportType</a>
</div>

<div class="widget-box transparent">
	<div class="widget-body">
		<div class="widget-main no-padding col-sm-5">
			<table class="table">
				<thead class="thin-border-bottom">
					<th> # </th>
					<th>Name</th>
					<th>Edit</th>
				</thead>
				<tbody>
					<?php $x = 0; ?> 
					@foreach (ExportType::all() as $export_type)
						<tr>
							<?php $x = $x+1; ?> 
							<td>{{ $x }} </td>
							<td>{{ $export_type->name }}</td>
							<td>
								<a href="{{ URL::to('export_types/'.$export_type->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">
									Edit
								</a>
							</td>
						</tr> 
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


{{-- Modal --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
			</div>
			<div class="modal-body">

				<div class="alert alert-default"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

			</div>
		</div>
	</div>
</div>

@stop