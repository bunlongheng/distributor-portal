@extends('layouts.main')
@section('content')

<style type="text/css">
/*CSS*/

</style>

<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Countries
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Create
			</small>
		</h1>
	</div>
</div>

<!-- /Header________________________________________________________________________  -->




<div class="col-lg-2">

	{{ Form::open(array('url' => 'countries/store', 'class' => 'form-horizontal', 'files'=>true)) }}	

	{{ Form::label('name', 'Name')}}
	{{ Form::text ('name', Input::old('name'), array('class'=> 'form-control', 'data-rel'=>"tooltip" , 'title'=>"required", 'data-placement'=>"right"))}} 

	{{ Form::label('code', 'Code')}}
	{{ Form::text ('code', Input::old('code'), array('class'=> 'form-control', 'data-rel'=>"tooltip" , 'title'=>"required", 'data-placement'=>"right"))}} 

	<br><br><br>

	{{ Form::label('logo', 'Upload country flag ')}}
	{{ Form::file ('logo', array('id'=>'id-input-file-1'))}} 

	
	<br><br><br>


	<a class="blue btn btn-default" href="{{URL::to('/countries/')}}"> Cancel </a>

	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-info'))}}

</div>

{{ Form::close()}}

@stop




















