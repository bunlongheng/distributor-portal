
<div class="form-group">
	<label class=" col-sm-4 control-label ">Since</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->start_date or ''}}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " >Sale Region</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->sale_region or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label ">Type</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->type or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label ">Tier</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->tier->level or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label ">Export Frequency </label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->export_frequency()->first()->name or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " >Discount</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $distributor->discount_rate_info or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label " >Export Type</label>
	<div class="col-sm-8">
		<span class="show-data">
			{{{ $export_type->name or '' }}}

		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label "> Activity Log</label>
	<div class="col-sm-8">
		<span class="show-data">
			<address>
				{{$distributor->activity_log }}
			</address>
		</span>
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-4 control-label "> Internal Note</label>
	<div class="col-sm-8">
		<span class="show-data">
			<address>
				{{ $distributor->internal_note }}
			</address>
		</span>
	</div>
</div>

