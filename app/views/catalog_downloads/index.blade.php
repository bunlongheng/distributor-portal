@extends('layouts.main')
@section('content')

<link href='http://fonts.googleapis.com/css?family=Knewave|Quicksand|Bevan|Merriweather+Sans:400,800|Comfortaa:400,700|Trocchi' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>

@include('catalog_downloads.sub.style')


<div class="widget-box transparent widget-body widget-main no-padding">
{{-- Internal View --}}
@if (Auth::user()->type == 'Admin' OR Auth::user()->type == 'Bioss')
	@if (Auth::user()->type == 'Admin')
		<a href="{{ URL::to('catalog_downloads/create') }}" class="btn btn-sm btn-success "><span class="glyphicon glyphicon-plus"></span> Create </a><br><br>
	@endif
	<table class="table">
		<thead class="thin-border-bottom">
			<th width="200" >Catalog Title </th>
			<th width="400" >Files Included</th>
			<th width="285" >Export Frequencies </th>
			<th width="100" >Posted On </th>
			@foreach ($export_types as $export_type)
				<th> {{{ $export_type->name or '' }}} </th>
			@endforeach
		</thead>
		<tbody>
			@foreach ($catalog_downloads as $catalog_download)
			<tr>
				<td class="black">{{ HTML::link('catalog_downloads/' . $catalog_download->id, $catalog_download->title) }}</td>
				<td>{{ $catalog_download->note }}</td>
				<td>
					@foreach($catalog_download->export_frequencies as $frequency)
						<span class="label {{ $frequency->name }}">{{{ $frequency->name or '' }}}</span>
					@endforeach
				</td>
				<td>
					{{ DateHelper::getDateFormat2($catalog_download->created_at) }}<br>
					<small class="grey">{{ DateHelper::day_ago($catalog_download->created_at) }} Ago</small>
				</td>
				@foreach ($export_types as $export_type)
					<td>
						<?php
							$product_export = ProductExport::where('catalog_download_id', '=', $catalog_download->id)
								->where('export_type_id', '=', $export_type->id)
								->first();
						?>
						@if($product_export)
							<a class="black btn btn-sm btn-primary" href="/catalog_downloads/{{$catalog_download->id}}/download/{{$export_type->id}}">
								<b class="white">Download</b>
								<small class="white">({{ FileHelper::formatBytes($product_export->size,0) }})</small>
							</a>
						@endif
					</td>
							
				@endforeach
			</tr>
			@endforeach	
		</tbody>
	</table>
	<hr>
{{-- Distributor View --}}
@else 
	<?php $dist_frequency = Auth::user()->distObj()->export_frequency()->first()->id; ?>
	@foreach ($catalog_downloads as $catalog_download)
		@if (in_array($dist_frequency, $catalog_download->export_frequencies->lists('id', 'id')))
			<?php $product_export = $catalog_download->product_exports->first(); ?>
			@if ($product_export)
				@include('catalog_downloads.sub.download')
				@include('catalog_downloads.sub.instruction')
				<hr>
			@endif
		@endif
	@endforeach
@endif
</div>
@stop