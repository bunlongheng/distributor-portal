@extends('layouts.main')
@section('content')


{{--Create Form--}}
{{ Form::open(array('url' => 'catalog_downloads/store', 'class' => 'form-horizontal', 'files'=>true)) }}

<div class="row">

	<div  class="col-lg-3">
		
		

		{{--Title--}}
		{{ Form::label('title' , 'Title', array('class'=> 'required cool-blue'))}}
		{{ Form::text ('title', Input::old('title'), array('class'=> 'form-control required cool-blue','title'=>'title'))}}
		{{ $errors->first('title','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}

		<div class="hr dotted"></div><br>
		


		

		{{--Export Date--}}
		{{ Form::label('exported_date' , 'Export Date', array('class'=> 'required cool-blue'))}}
		<div class="input-group">
			{{ Form::text ('exported_date', Input::old('title'), array('class'=> 'form-control date-picker required cool-blue ','data-date-format'=>'mm/dd/yyyy'))}}
			{{ $errors->first('exported_date','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
		</div>
		<hr>

		
		{{--Export Frequencies--}}
		{{ Form::label('export_frequency' , 'Export Frequency', array('class'=> 'required cool-blue'))}} <br>
		
		@foreach (ExportFrequency::all() as $export_frequency)
		
			<input type="checkbox" name="export_frequencies[]" value="{{ $export_frequency->id }}" id="{{ $export_frequency->id }}">
			{{$export_frequency->name}} <br>
		
		@endforeach

		{{ $errors->first('export_frequencies','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
		
		<br><div class="hr dotted"></div>

	</div>

	<div  class="col-lg-1"></div>
	
	<div  class="col-lg-3">

		
		{{--Export Type--}}
		@foreach ( $export_types as $export_type )

		{{ Form::label('type_' . $export_type->id , $export_type->name , array('class'=> ' cool-blue') )}}


		{{ Form::file ('type_' . $export_type->id, array('id'=>'id-input-file-zip', 'class'=> 'required cool-blue'))}}
		{{ $errors->first('type_'. $export_type->id,'<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
		<br>
		<div class="hr dotted"></div>


		@endforeach
	</div>
	<div  class="col-lg-1"></div>


	<div  class="col-lg-4">


		{{--Description--}}
		<div class="form-group ">
			{{ Form::label('description' , 'Description', array('class'=> ' cool-blue'))}}<br>
			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					{{ Form::textarea('note','', array('id' => 'note', 'class' => 'col-sm-12')); }}
					<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
					<script>CKEDITOR.replace('note');</script>
					{{ $errors->first('note','<a title=":message" class="label label-danger label-xs">
					<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
				</div>
			</div>
		</div>

	


	</div>

</div>


<div class="container"><div class="row"><div class="col-lg-12"></div></div></div>


<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
<div class="center">
	<a class="blue btn-lg btn btn-default" href="{{URL::to('/catalog_downloads/')}}"> Cancel </a>
	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-lg btn-info'))}}
	<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
</div>




{{ Form::close()}}







@stop