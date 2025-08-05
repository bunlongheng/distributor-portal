@extends('layouts.main')
@section('content')

<style type="text/css">
	/*CSS*/

</style>



<!-- Header_________________________________________________________________________  -->

<div class="page-content-area">
	<div class="page-header">
		<h1 class="primary">
			Tiers
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Edit
			</small>
		</h1>
	</div>
</div>

<!-- /Header________________________________________________________________________  -->


<div class="col-lg-3">

	{{ Form::model($tier,array('route' => array('tiers.update', $tier->id),'method' => 'PUT')) }}



	{{ Form::label('level', 'Level')}}
	{{ Form::text ('level', Input::old('level'), array('class'=> 'form-control'))}}


	<br><br><br><hr>


	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete Tier  </a> <br><br>



	{{ Form::hidden('$id', $tier->id)}}
	<a class="blue btn btn-default" href="{{URL::to('/tiers/')}}"> Cancel </a>
	{{ Form::submit ('Done',array('class'=> 'btn btn-success'))}}


</div>



</div>

{{ Form::close()}}

<!-- Modal_____________________________________________________________________________________________________________________________ -->

<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	<div class=" col-lg-4"> </div>

	<div class=" center col-lg-4">

		{{ Form::model(
			$tier,
			array(
				'route' => array('tiers.destroy', $tier->id),
				'method' => 'DELETE', 'files' => true,
				)) }}

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				{{ Form::submit ('Delete Tier', array('class'=> 'btn btn-danger btn-lg btn-block', 'data-rel'=>"tooltip" , 'title'=>"Are you sure ?", 'data-placement'=>"top"))}}<br><br>


				<button data-rel="tooltip"  title="Go Back" data-placement="bottom"  type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br> 

				{{ Form::hidden('$id', $tier->id)}}
				{{ Form::close()}}



			</div>
		</div>
		<!-- /Modal_____________________________________________________________________________________________________________________________ -->



		@stop







