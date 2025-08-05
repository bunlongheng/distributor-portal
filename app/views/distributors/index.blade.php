@extends('layouts.main')
@section('content')


@include('distributors.sub.index.style')
@include('distributors.sub.index.create_button')


<style type="text/css">

	table.dataTable thead .sorting,
	table.dataTable thead .sorting_asc,
	table.dataTable thead .sorting_desc {
		background : none;
	}

	#nav ul
	{
		text-align: center;
		list-style: none;

	}

	#nav li
	{
		float: left;
		margin-left: 10px;
		list-style-type: none;
		padding-right: 100px;
	}


	/*Sticky*/
	.sticky-AS{
		font-size: 15px !important;
		color: orange !important;
		background-color : transparent !important;
	}
	.sticky-EU{
		font-size: 15px !important;
		color: #50c0de !important;
		background-color : transparent !important;
	}
	.sticky-NA{
		font-size: 15px !important;
		color: red !important;
		background-color : transparent !important;
	}
	.sticky-OC{
		font-size: 15px !important;
		color: #428bca !important;
		background-color : transparent !important;
	}
	.sticky-SA{
		font-size: 15px !important;
		color: #5cb85c !important;
		background-color : transparent !important;
	}
	.sticky-AF{
		font-size: 15px !important;
		color: #6E6E6E !important;
		background-color : transparent !important;
	}


	/*Sticky*/
	.sticky-AS:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: orange !important;
		background-color : transparent !important;

	}
	.sticky-EU:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: #50c0de !important;
		background-color : transparent !important;

	}
	.sticky-NA:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: red !important;
		background-color : transparent !important;

	}
	.sticky-OC:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: #428bca !important;
		background-color : transparent !important;

	}
	.sticky-SA:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: #5cb85c !important;
		background-color : transparent !important;

	}
	.sticky-AF:hover{
		font-size: 15px !important;
		font-weight: bold;
		color: #6E6E6E !important;
		background-color : transparent !important;

	}

</style>




@foreach ($continents as $continent)
<?php $continent_count = Distributor::where('continent_id', '=', $continent->id)->get()->count() ?>
@if ($continent_count > 0)
@include('distributors.sub.index.continent_main_content')
@endif
@endforeach





@stop