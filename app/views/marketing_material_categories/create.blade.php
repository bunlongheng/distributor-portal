@extends('layouts.main')
@section('content')

<style type="text/css">
/*CSS*/

</style>


<div class="col-lg-2">

	{{ Form::open(array('url' => 'marketing_material_categories/store')) }}

	{{ Form::label('name', 'Name')}}
	{{ Form::text ('name', Input::old('name'), array('class'=> 'form-control', 'data-rel'=>"tooltip" , 'title'=>"required", 'data-placement'=>"right"))}} 

	
	<br><br><br>

	{{ Form::label('order', 'Display Order')}}
	{{ Form::text ('order', Input::old('order'), array('class'=> 'form-control', 'data-rel'=>"tooltip" , 'title'=>"required", 'data-placement'=>"right"))}}

	<br><br><br> 


	<a class="blue btn btn-default" href="{{URL::to('/marketing_material_categories/')}}"> Cancel </a>

	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-info'))}}

</div>

{{ Form::close()}}

@stop




















