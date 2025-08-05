@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/css/root/float_label.css">

<br><br>
<br><br>

{{ Form::model( 
	$marketing_material, 
	array( 'route' => array('marketing_materials.update', $marketing_material->id),

		'method' => 'PUT',
		'files'=>true , 
		'class' => 'form-horizontal' 

		)) }}

		<div class="row">
			<div class="col-sm-3 align-left">

			<div class="form-group ">
					<label class="col-sm-4 control-label required " >Category </label>

					<div class=" col-sm-8 form-group float-label-control">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="ace-icon fa fa-star"></i>
							</span>

							<?php $marketing_materials_category = MarketingMaterialCategory::lists('name', 'id'); ?>
							{{ Form::select('marketing_materials_category_id', $marketing_materials_category) }}
						</div>
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 required control-label ">Title </label>
					<div class="col-sm-9 form-group float-label-control ">
						<span class="input-icon input-icon-right">
							{{ Form::text('title', isset($marketing_material->title) ? $marketing_material->title : '' , array('id'=>'form-field-icon-2')); }}
							{{ $errors->first('title','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3  control-label ">Resolution </label>
					<div class="col-sm-9 form-group float-label-control ">
						<span class="input-icon input-icon-right">
							{{ Form::text('resolution', isset($marketing_material->resolution) ? $marketing_material->resolution : '' , array('id'=>'form-field-icon-2')); }}
							{{ $errors->first('resolution','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3  control-label ">Print Size </label>
					<div class="col-sm-9 form-group float-label-control ">
						<span class="input-icon input-icon-right">
							{{ Form::text('print_size', isset($marketing_material->print_size) ? $marketing_material->print_size : '' , array('id'=>'form-field-icon-2')); }}
							{{ $errors->first('print_size','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</span>
					</div>
				</div>


				



				<div class="form-group ">
					<label  class="col-sm-4 control-label  " for="description"> Description </label><br>
					<div >
						<div class="input-group">
							{{ Form::textarea('description', isset($marketing_material->description) ? $marketing_material->description : '', array('id' => 'description')); }}
							<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
							<script>CKEDITOR.replace('description');</script>
							{{ $errors->first('description','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}<br>
						</div>
					</div>
				</div>

			</div>

			<!-- ________________________________________ -->
			<div class="col-sm-1 col-sm-4 align-left"></div>
			<!-- ________________________________________ -->

			<div class="col-sm-2   align-left ">


				<div class="form-group">
					<label class=" col-sm-12 required " for="thumb_path">Small Thumbnail</label><br><br>
					<div class="">
						<div class="clearfix">
							{{ Form::file ('thumb_path', array('id'=>'id-input-file-1'))}}
							{{ $errors->first('thumb_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</div>
					</div>
				</div>

				<br><hr>


				<div class="form-group">
					<label class=" col-sm-12 required " for="media_path">Actual File </label><br><br>
					<div class="">
						<div class="clearfix">
							{{ Form::file ('media_path', array('id'=>'id-input-file-zip'))}}
							{{ $errors->first('media_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
						</div>
					</div>
				</div>


			</div>

		</div>

		<br><br>

		<div class="container">
			<div class="row">
				<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete Marketing Material </a> <br><br>
				{{ Form::hidden('$id', $marketing_material->id)}}
				<a class="blue btn btn-default" href="{{URL::to('/marketing_materials/')}}"> Cancel </a>
				{{ Form::submit ('Done',array('class'=> 'btn btn-success'))}}

			</div>
		</div>
		{{ Form::close()}}

		<!-- Modal_____________________________________________________________________________________________________________________________ -->

		<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

			<div class=" col-lg-4"> </div>

			<div class=" center col-lg-4">

				{{ Form::model(
					$marketing_material,
					array(
						'route' => array('marketing_materials.destroy', $marketing_material->id),
						'method' => 'DELETE', 'files' => true,
						)) }}

						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

						{{ Form::submit ('Delete Marketing Material', array('class'=> 'btn btn-danger btn-lg btn-block', 'data-rel'=>"tooltip" , 'title'=>"Are you sure ?", 'data-placement'=>"top"))}}<br><br>


						<button data-rel="tooltip"  title="Go Back" data-placement="bottom"  type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br> 

						{{ Form::hidden('$id', $marketing_material->id)}}
						{{ Form::close()}}



					</div>
				</div>
				<!-- /Modal_____________________________________________________________________________________________________________________________ -->



				@stop







