@extends('layouts.main')
@section('content')

<!-- Header_________________________________________________________________________  -->
<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Marketing Material Categories
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Index
			</small>
		</h1>
	</div>
</div>
<!-- /Header________________________________________________________________________  -->

<div class="btn-group ">
	<a href="{{ URL::to('marketing_material_categories/create') }}" class="btn btn-sm btn-primary "> <span class="glyphicon glyphicon-plus"></span> Marketing Material Category </a>
</div>

<div class="widget-box transparent">
	<div class="widget-body">
		<div class="widget-main no-padding col-sm-5">
			<table class="table">
				<thead class="thin-border-bottom">
					<th>Order</th>
					<th>Name</th>
					<th>Edit</th>
				</thead>
				<tbody>
				@foreach ($marketing_material_categories as $marketing_material_category)
					<tr>	
						<td>{{{ $marketing_material_category->order or '' }}}</td>
						<td>{{$marketing_material_category->name}}</td>
						<td><a href="{{ URL::to('marketing_material_categories/'.$marketing_material_category->id.'/edit') }}" type="button" class="btn btn-primary btn-xs" title="Edit">Edit</a></td>
					</tr> 
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
	
@stop
