<?php
$country = $distributor->country()->first();
$distributors = Distributor::where('country_id', '=', $country->id)
->orderBy('tier_id')
->get();
?>
@foreach ($distributors as $distributor)
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			@include('distributors.sub.index.detail')
		</div>
	</div>
</div>
@endforeach