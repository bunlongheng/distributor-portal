<div class="form-group">
	<label class="col-sm-3 control-label required ">Start Date</label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('start_date', isset($distributor->start_date) ? $distributor->start_date : '' , array('class' => 'date-picker ','id' => 'id-date-picker-1', 'data-date-format' => 'yyyy-mm-dd')); }}
			{{ $errors->first('start_date','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label ">End Date</label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('end_date', isset($distributor->end_date ) ? $distributor->end_date  : '' , array('class' => 'date-picker ','id' => 'id-date-picker-1', 'data-date-format' => 'yyyy-mm-dd')); }}
			{{ $errors->first('end_date','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label ">Sale Region</label>
	<div class="col-sm-9 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('sale_region',isset($distributor->sale_region ) ? $distributor->sale_region  : '' , array('class' => '','data-rel' => 'tooltip', 'title_main' => 'Ex. All countries except Brazil.', 'data-placement' => 'right')); }}
			{{ $errors->first('sale_region','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-3 control-label  required  " for="type">Type </label>
	
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-key"></i>
			</span>
			{{ Form::select('type', array('Exclusive' => 'Exclusive', 'Non Exclusive' => 'Non Exclusive', 'OEM' => 'OEM', 'MKP' => 'MKP'), isset($distributor->type ) ? $distributor->type  : ''); }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-3 control-label required " >Tier </label>
	
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-star"></i>
			</span>
			
			<?php $tiers = Tier::lists('level', 'id'); ?>
			{{ Form::select('tier', $tiers,  isset($distributor->tier->id) ? $distributor->tier->id : '' ) }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-3 control-label required " >Export Frequency </label>
	
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-star"></i>
			</span>
			
			<?php $export_frequencies = ExportFrequency::lists('name', 'id'); ?>
			{{ Form::select('export_frequency', $export_frequencies,  isset($distributor->export_frequency->name) ? $distributor->export_frequency->name : '' ) }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-3 control-label required " for="discount_rate_info">Discount </label>
	
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-gift"></i>
			</span>
			
			{{ Form::select('discount_rate_info', array('20%' => '20%', '30%' => '30%', '40%' => '40%', '50%' => '50%'),
			isset($distributor->discount_rate_info ) ? $distributor->discount_rate_info  : '' ); }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-3 control-label required " >Export Type </label>
	
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-bar-chart-o"></i>
			</span>
			
			<?php $export_types = ExportType::lists('name', 'id'); ?>
			{{ Form::select('export_type', ExportType::lists('name', 'id'),
			isset($export_type->id ) ? $export_type->id  : '' ) }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label  class="col-sm-3 control-label  " for="activity_log">Activity Log </label>
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			{{ Form::textarea('activity_log',  isset($distributor->activity_log ) ? $distributor->activity_log  : '' , array('id' => 'activity_log')); }}
			<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
			<script>CKEDITOR.replace('activity_log');</script>
			{{ $errors->first('activity_log','<a title=":message" class="label label-danger label-xs">
			<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
		</div>
	</div>
</div>
<div class="form-group ">
	<label  class="col-sm-3 control-label  " for="internal_note">Internal Note </label>
	<div class=" col-sm-9 form-group float-label-control">
		<div class="input-group">
			{{ Form::textarea('internal_note',  isset($distributor->internal_note ) ? $distributor->internal_note  : '' , array('id' => 'internal_note')); }}
			<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
			<script>CKEDITOR.replace('internal_note');</script>
			{{ $errors->first('internal_note','<a title=":message" class="label label-danger label-xs">
			<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
		</div>
	</div>
</div>