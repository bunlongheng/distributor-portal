
@if ($message = Session::get('success'))

<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-check green"></i>

	<strong class="green">{{ nl2br($message) }}</strong>

</div>

@elseif ($message = Session::get('email'))

<div class="alert alert-block alert-info">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-paper-plane cool-blue "></i>

	{{ nl2br($message) }}

</div>


@elseif ($message = Session::get('work'))

<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-check cool-green "></i>

	{{ nl2br($message) }}

</div>




@elseif ($message = Session::get('error'))

<div class="alert alert-block alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-times red"></i>

	<strong class="red">{{ nl2br($message) }}</strong>

</div>
@endif