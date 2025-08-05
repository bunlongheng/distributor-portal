

@extends ('layouts.form')

@section('content')

<style type="text/css">
    .signin{
        text-align: center;
    }
    #forgetpassword{
        /*color:#5cb85c;*/
        color:silver;

    }
</style>



<form class="form-horizontal" role="form" action=" {{ URL::route('account-sign-in-post')}}" method="post" >


 @if ($errors->has('username')){{ $errors->first('username')}} @endif
 <div class="form-group">
    <label for=""> Email </label>
    <input id="email" placeholder="Email"  type="text" class="form-control" required name="username" {{ ( Input::old('username')) ? 'value="'.e(Input::old('username')).'"' : '' }}>
</div><br>



@if ($errors->has('password')){{ $errors->first('password')}} @endif
<div class="form-group">
    <label for=""> Password </label>
    <input id="password" placeholder="Password"  type="password" class="form-control" required name="password">
</div><br>


<br>


<button type="submit" class="btn btn-success btn-sm btn-block ">Sign In </button>
   

    {{ Form::token() }}


</form><br>


<div class="col-lg-12 text-center">

    <a id="forgetpassword" href="{{ URL::route('account-forgot-password') }}"> Forget Password </a> <br> 
   

</div>



@stop   

