@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="/css/root/float_label.css">

<br><br>
<br><br>


{{ Form::open(array('url' => 'marketing_materials/store', 'class' => 'form-horizontal', 'files'=>true)) }}  


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
					{{ Form::text('title', '', array('id'=>'form-field-icon-2')); }}
					{{ $errors->first('title','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</span>
			</div>
		</div>


		

		<div class="form-group">
			<label class="col-sm-3 control-label ">Resolution </label>
			<div class="col-sm-9 form-group float-label-control ">
				<span class="input-icon input-icon-right">
					{{ Form::text('resolution', '', array('id'=>'form-field-icon-2')); }}
					{{ $errors->first('resolution','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label ">Print Size </label>
			<div class="col-sm-9 form-group float-label-control ">
				<span class="input-icon input-icon-right">
					{{ Form::text('print_size', '', array('id'=>'form-field-icon-2')); }}
					{{ $errors->first('print_size','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</span>
			</div>
		</div>



		<div class="form-group ">
			<label  class="col-sm-4 control-label  " for="description"> Description </label><br>
			<div >
				<div class="input-group">
					{{ Form::textarea('description', '', array('id' => 'description')); }}
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
			<label class=" col-sm-12 required" for="thumb_path"> Small Thumbnail </label><br><br>
			<div class="">
				<div class="clearfix">
					{{ Form::file ('thumb_path', array('id'=>'id-input-file-1'))}}
					{{ $errors->first('thumb_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

		<br><hr>


		<div class="form-group">
			<label class=" col-sm-12 required" for="media_path"> Actual File </label><br><br>
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

		<a class="blue btn btn-default" href="{{URL::to('/marketing_materials/')}}"> Cancel </a>

		{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-info'))}}

	</div>
</div>



{{ Form::close()}}

@stop




















