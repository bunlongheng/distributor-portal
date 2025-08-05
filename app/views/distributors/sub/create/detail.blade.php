
<div class="form-group">
	<label class="col-sm-4 control-label required ">Member Since</label>
	<div class="col-sm-8 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('start_date', '', array('class' => 'date-picker ','id' => 'id-date-picker-1', 'data-date-format' => 'yyyy-mm-dd')); }}
			{{ $errors->first('start_date','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label ">Sale Region</label>
	<div class="col-sm-8 form-group float-label-control ">
		<span class="input-icon input-icon-right">
			{{ Form::text('sale_region', '', array('class' => '','data-rel' => 'tooltip', 'title_main' => 'Ex. All countries except Brazil.', 'data-placement' => 'right')); }}
			{{ $errors->first('sale_region','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
			<!-- <i class="ace-icon fa fa-envelope green"></i> -->
		</span>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-4 control-label required  " for="type">Type </label>
	
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-key"></i>
			</span>
			{{ Form::select('type', array('Exclusive' => 'Exclusive', 'Non Exclusive' => 'Non Exclusive', 'OEM' => 'OEM', 'Marketing Place' => 'Marketing Place'), 'Exclusive'); }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-4 control-label required " >Tier </label>
	
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-star"></i>
			</span>
			
			<?php $tiers = Tier::lists('level', 'id'); ?>
			{{ Form::select('tier', $tiers) }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-4 control-label required " >Export Frequency </label>
	
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-star"></i>
			</span>
			
			<?php $export_frequencies = ExportFrequency::lists('name', 'id'); ?>
			{{ Form::select('export_frequency', $export_frequencies) }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-4 control-label required " for="discount_rate_info">Discount </label>
	
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-gift"></i>
			</span>
			
			{{ Form::select('discount_rate_info', array('20%' => '20%', '30%' => '30%', '40%' => '40%', '50%' => '50%'), '30%'); }}
		</div>
	</div>
</div>
<div class="form-group ">
	<label class="col-sm-4 control-label required " >Export Type </label>
	
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="ace-icon fa fa-bar-chart-o"></i>
			</span>
			
			<?php $export_types = ExportType::lists('name', 'id'); ?>
			{{ Form::select('export_type', $export_types) }}
		</div>
	</div>
</div>

<div class="form-group ">
	<label  class="col-sm-4 control-label  " for="activity_log">Activity Log </label>
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			{{ Form::textarea('activity_log', '', array('id' => 'activity_log')); }}
			<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
			<script>CKEDITOR.replace('activity_log');</script>
			{{ $errors->first('activity_log','<a title=":message" class="label label-danger label-xs">
			<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
		</div>
	</div>
</div>

<div class="form-group ">
	<label  class="col-sm-4 control-label  " for="internal_note">Internal Note </label>
	<div class=" col-sm-8 form-group float-label-control">
		<div class="input-group">
			{{ Form::textarea('internal_note', '', array('id' => 'internal_note', 'class' => 'col-sm-12')); }}
			<script type="text/javascript" src="<?= url('/assets/js/ckeditor/ckeditor.js') ?>"></script>
			<script>CKEDITOR.replace('internal_note');</script>
			{{ $errors->first('internal_note','<a title=":message" class="label label-danger label-xs">
			<span class="glyphicon glyphicon-remove  "></span> :message </a>') }}<br>
		</div>
	</div>
</div>





