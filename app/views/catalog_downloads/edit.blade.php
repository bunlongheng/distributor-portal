@extends('layouts.main')
@section('content')


{{ Form::model( $catalog_download, array('route' => array('catalog_downloads.update', $catalog_download->id),'method' => 'PUT', 'files'=>true )) }}



<div class="row">

	<div class="col-lg-3">


		{{--Title--}}
		{{ Form::label('title', 'Title', array('class'=> 'required cool-blue'))}}
		{{ Form::text ('title', Input::old('title'), array('class'=> 'form-control'))}}
		{{ $errors->first('title','<a title=":message" class="label label-danger label-xs">
		<span class="glyphicon glyphicon-remove"></span> :message </a>') }}

		<div class="hr dotted"></div>
		
		
		
		{{--Export Date--}}
		{{ Form::label('exported_date' , 'Export Date', array('class'=> 'required cool-blue'))}}
		<div class="input-group">
			{{ Form::text ('exported_date', isset($product_export->exported_date) ? DateHelper::getDateFormat2($product_export->exported_date) : ''  , array('class'=> 'form-control date-picker required cool-blue ','data-date-format'=>'mm/dd/yyyy'))}}
			{{ $errors->first('exported_date','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
		</div><hr>

		

		{{--Export Frequency--}}
		{{ Form::label('export_frequency' , 'Export Frequency', array('class'=> 'required cool-blue'))}} <br>
		
		<?php $frequencies = $catalog_download->export_frequencies()->get(); $array = array(); ?>
		
		@foreach($frequencies as $frequency) 
			
			<?php array_push($array,$frequency->id); ?> 
		
		@endforeach	

		@foreach (ExportFrequency::all() as $export_frequency)
			
			<?php if( in_array($export_frequency->id , $array)) $checked = "checked"; else  $checked = " "; ?>
			
			<input type="checkbox" <?php echo $checked; ?> name="export_frequencies[]" value="{{ $export_frequency->id }}" id="{{ $export_frequency->id }}">
			
			{{$export_frequency->name}} <br>
		
		@endforeach

	</div>

	<div  class="col-lg-1"></div>
	
	{{--Export Type--}}
	<div  class="col-lg-3">
		@foreach ( $export_types as $export_type )
			{{ Form::label('type_' . $export_type->id , $export_type->name , array('class'=> 'required cool-blue') )}}
			{{ Form::file ('type_' . $export_type->id, array('id'=>'id-input-file-zip', 'class'=> 'required cool-blue'))}}
			{{ $errors->first('type_'. $export_type->id,'<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
			<br>
			<div class="hr dotted"></div>
		@endforeach
	</div>

	<div  class="col-lg-1"></div>
	
	

	{{--Description--}}
	<div  class="col-lg-4">
		<div class="form-group ">
			<label  class="col-sm-12 control-label  " for="note"> Description </label>
			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					{{ Form::textarea('note', Input::old('note'), array('id' => 'note', 'class' => 'col-sm-12')); }}
					<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
					<script>CKEDITOR.replace('note');</script>
					{{ $errors->first('note','<a title=":message" class="label label-danger label-xs">
					<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
				</div>
			</div>
		</div>
	</div>

</div>

<br><br><br><br><br><br>



{{--Delete and Cancel--}}
<div class="row center">
	<div  class="col-lg-12">
		<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete_bioss"> Delete catalog_download </a> <br><br>
		{{ Form::hidden('$id', $catalog_download->id)}}
		<a class="blue btn btn-default" href="{{URL::to('/catalog_downloads/')}}"> Cancel </a>
		{{ Form::submit ('Update',array('class'=> 'btn btn-success'))}}
	</div>
</div>



{{ Form::close()}}


{{--Modal--}}
<div class="modal fade" id="delete_bioss" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class=" col-lg-4"> </div>
	<div class=" center col-lg-4">
		{{ Form::model($catalog_download, 
			array('route' => array('catalog_downloads.destroy', $catalog_download->id),'method' => 'DELETE', 'files' => true )) }}
			
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			{{ Form::submit ('Delete this Post', array('class'=> 'btn btn-danger btn-lg btn-block', 'data-rel'=>"tooltip" , 'title'=>"Are you sure ?", 'data-placement'=>"top"))}}	<br><br>
			<button data-rel="tooltip"  title="Go Back" data-placement="bottom"  type="button" class="btn btn-primary btn-lg btn-block" class="close" data-dismiss="modal" > Cancel </button> <br>
			{{ Form::hidden('$id', $catalog_download->id)}}
	   
	   {{ Form::close()}}
	</div>
</div>
		



@stop