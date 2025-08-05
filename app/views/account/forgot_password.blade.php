
@extends ('layouts.form')

@section('content')
<style type="text/css">


	
</style>

<br><br>




<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Forget your password ?</strong><br>

	We'll email you the link to re-set your password.
	<br />
</div>




<form class="form-horizontal" role="form" action=" {{ URL::route('account-forgot-password-post')}}" method="post" >
	@if ($errors->has('email')){{ $errors->first('email')}} @endif
	
	<div class="form-group">
		<label for=""> Enter your Email </label>
		<input  type="text" class="form-control" required placeholder="Email" name="email" {{ ( Input::old('email')) ? 'value="'.e(Input::old('email')).'"' : '' }}>
	</div><br>


	<button type="submit" class="btn btn-warning btn-outline btn-block"> Recover Password  </button>{{ Form::token() }}

</form> <br><br>



<div class="col-lg-12 text-center">

    <a href="{{ URL::route('home') }}"> Go Back  </a> <br> 

</div>









@stop



