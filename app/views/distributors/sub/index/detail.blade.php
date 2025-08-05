<?php

$export_type = $distributor->export_type()->first();
$country = $distributor->country()->first();
$tier = $distributor->tier()->first();

?>


@if ( $distributor->active == 2)
<table class="table table-hover silver">
	@include('distributors.sub.index.tbody')
</table>
@else
<table class="table table-hover">
	@include('distributors.sub.index.tbody')
</table>
@endif