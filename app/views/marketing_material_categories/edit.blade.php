@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/

</style>



<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Marketing Material Category 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Edit
			</small>
		</h1>
	</div>
</div>

<!-- /Header________________________________________________________________________  -->


<div class="col-lg-3">

	{{ Form::model($marketing_material_category,array('route' => array('marketing_material_categories.update', $marketing_material_category->id),'method' => 'PUT')) }}



	{{ Form::label('name', 'Name')}}
	{{ Form::text ('name', Input::old('name'), array('class'=> 'form-control'))}} 

	

	<br><br><br><hr>


	{{ Form::label('order', 'Display Order')}}
	{{ Form::text ('order', Input::old('order'), array('class'=> 'form-control'))}} 

	

	<br><br><br><hr>


	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete Category </a> <br><br>



	{{ Form::hidden('$id', $marketing_material_category->id)}}
	<a class="blue btn btn-default" href="{{URL::to('/marketing_material_categories/')}}"> Cancel </a>
	{{ Form::submit ('Done',array('class'=> 'btn btn-success'))}}


</div>



</div>

{{ Form::close()}}

<!-- Modal_____________________________________________________________________________________________________________________________ -->

<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	<div class=" col-lg-4"> </div>

	<div class=" center col-lg-4">

		{{ Form::model(
			$marketing_material_category,
			array(
				'route' => array('marketing_material_categories.destroy', $marketing_material_category->id),
				'method' => 'DELETE', 'files' => true,
				)) }}

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				{{ Form::submit ('Delete Category', array('class'=> 'btn btn-danger btn-lg btn-block', 'data-rel'=>"tooltip" , 'title'=>"Are you sure ?", 'data-placement'=>"top"))}}<br><br>


				<button data-rel="tooltip"  title="Go Back" data-placement="bottom"  type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br> 

				{{ Form::hidden('$id', $marketing_material_category->id)}}
				{{ Form::close()}}



			</div>
		</div>
		<!-- /Modal_____________________________________________________________________________________________________________________________ -->



		@stop







