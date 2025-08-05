@extends('layouts.main')
@section('content')


{{--Upload Form--}}
{{ Form::open(array('url' => 'product_uploads/store', 'class' => 'form-horizontal', 'files'=>true)) }}

<div class="row">

    <div  class="col-lg-3">       
        @foreach ( $export_types as $export_type )
        {{--Export Type--}}
        {{ Form::label('csv_file' , 'Product File' , array('class'=> ' cool-blue') )}}
        {{ Form::file ('csv_file' , array('id'=>'id-input-file-csv', 'class'=> 'required cool-blue'))}}
        {{ $errors->first('csv_file','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>')}}
        <br>
        @endforeach
    </div>
</div>

<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
<div>
    <a class="blue btn-lg btn btn-default" href="{{URL::to('/product_uploads/')}}"> Cancel </a>
    {{ Form::submit ('Upload',array('class'=> 'btn btn-outline btn-lg btn-info'))}}
    <div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
</div>

{{ Form::close()}}

@stop