@extends('layouts.main')
@section('content')
<style type="text/css">
	/*CSS*/
</style>
<div class="col-lg-3">
	{{ Form::model($country,array('route' => array('countries.update', $country->id),'method' => 'PUT', 'files'=>true)) }}
	{{ Form::label('name', 'Country Name')}}
	{{ Form::text ('name', Input::old('name'), array('class'=> 'form-control'))}}
	<br>
	{{ Form::label('code', 'Country Code. Ex. AR = Argentina ')}}
	{{ Form::text ('code', Input::old('code'), array('class'=> 'form-control'))}}

	<br>
	{{ Form::label('weight', 'Weight')}}
	{{ Form::text ('weight', Input::old('weight'), array('class'=> 'form-control'))}}

	<br>
	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete Country  </a> <br><br>
	{{ Form::hidden('$id', $country->id)}}
	<a class="blue btn btn-default" href="{{URL::to('/countries/')}}"> Cancel </a>
	{{ Form::submit ('Done',array('class'=> 'btn btn-success'))}}
</div>
</div>
{{ Form::close()}}
<!-- Modal_____________________________________________________________________________________________________________________________ -->
<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class=" col-lg-4"> </div>
	<div class=" center col-lg-4">
		{{ Form::model(
			$country,
			array(
				'route' => array('countries.destroy', $country->id),
				'method' => 'DELETE', 'files' => true,
				)) }}
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				{{ Form::submit ('Delete Country', array('class'=> 'btn btn-danger btn-lg btn-block', 'data-rel'=>"tooltip" , 'title'=>"Are you sure ?", 'data-placement'=>"top"))}}<br><br>
				<button data-rel="tooltip"  title="Go Back" data-placement="bottom"  type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br>
				{{ Form::hidden('$id', $country->id)}}
				{{ Form::close()}}
			</div>
		</div>
		<!-- /Modal_____________________________________________________________________________________________________________________________ -->
		@stop