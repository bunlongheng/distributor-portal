<?php
$distributors = Distributor::where('continent_id', '=', $continent->id)
->orderBy('tier_id')
->groupBy('country_id')
->get()
?>
@foreach ($distributors as $distributor)


<div class="container border_2">
	<div class="row widget-main no-padding ">
	<span class="pull-right">
	@include('distributors.sub.index.country_header')
	</span>
		
		@include('distributors.sub.index.core')



	</div>
</div>
<br>


@endforeach


