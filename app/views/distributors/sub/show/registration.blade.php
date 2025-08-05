


<div class="form-group">
	<label class="col-sm-4 control-label ">Account Status </label>
	<div class="col-sm-8  ">
		<span class="show-data">

			<?php

			if($distributor->active == 0){
				$status = 'Inactive';
			}else if ($distributor->active == 1){
				$status = 'Active';
			}  else {
				$status = 'Disabled';
			}

			?>

			{{ $status }}


			@if ( $distributor->active == 1) <td width="100"  ><i title="Active" class="ace-icon fa fa-circle light-green"></i></td>
			@elseif ( $distributor->active == 0) <td width="100"  ><i title="Pending" class="ace-icon fa fa-circle orange"></i></td>
			@else
			<td width="100"  ><i title="Disable" class="ace-icon fa fa-circle-o silver"></i></td>
			@endif




		</span>
	</div>
</div>




