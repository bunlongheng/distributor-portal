@extends('layouts.main')
@section('content')


<a href="{{ URL::to('catalog_downloads/'.$catalog_download->id.'/edit') }}" type="button" class="btn btn-success btn-sm " title="Edit">
	Edit
</a><br><br>



<div class="col-lg-12">
	<h2 class="widget-title lighter">
		
		{{ $catalog_download->title }}
		<small class="pull-right">
			{{  DateHelper::getDateFormat2($catalog_download->created_at) }} <br>
			<small class="cool-blue"> {{  DateHelper::getAgo($catalog_download->created_at) }} ago  </small>
		</small>
	</h2>
	<table class="table table-bordered table-hover">
		
		<tbody>
			
			@foreach ($export_types as $export_type)
			<?php $product_export = $export_type->product_exports()->get()->first(); ?>
			
			<tr>
				
				
				<td>
					<?php $product_export = $export_type->product_exports()->get()->first(); ?>
					<div class="col-md-12">
						<div >
							
							<p>

								<h5 > {{$export_type->name}} </h5>
							</p>
							<p>
								<p class="gray">
								<small>Bioss_{{$catalog_download->title}}.zip</small>
								</p>
								<a class="black" href="/catalog_downloads/{{$catalog_download->id}}/download/{{$export_type->id}}">
									<b class="cool-blue">
										Download
									</b>
								</a> <small class="purple">
								{{ FileHelper::formatBytes($product_export->size,0) }}
							</small>
							
						</p>
					</div>
				</div>
			</td>
			<tr>
				@endforeach
			</tbody>
		</table>
	</div>


	

	@stop