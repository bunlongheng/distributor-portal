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
				Create
			</small>
		</h1>
	</div>
</div>

<!-- /Header________________________________________________________________________  -->




<div class="col-lg-2">

	{{ Form::open(array('url' => 'export_frequencies/store')) }}

	{{ Form::label('name', 'name')}}
	{{ Form::text ('name', Input::old('name'), array('class'=> 'form-control', 'data-rel'=>"tooltip" , 'title'=>"required", 'data-placement'=>"right"))}} 

	
	<br><br><br>

	<a class="blue btn btn-default" href="{{URL::to('/export_frequencies/')}}"> Cancel </a>

	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-info'))}}

</div>

{{ Form::close()}}

@stop




















