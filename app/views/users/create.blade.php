<!-- Create Bioss User  -->
@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="/css/root/float_label.css">


<!-- Header_________________________________________________________________________  -->
<div class="page-header">
	<h1 class="green">
		Bioss Users
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Create
		</small>
	</h1>
</div>
<!-- /Header________________________________________________________________________  -->


{{ Form::open(array('url' => 'users/store', 'class' => 'form-horizontal', 'files'=>true)) }}


<div class="row">
	
	<div  class="col-lg-3">

		<div class="form-group ">
			<label class="col-sm-4 control-label required " >Type </label>

			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="ace-icon fa fa-key"></i>
					</span>

					{{ Form::select('type', array( 'Bioss' => 'Bioss', 'Admin' => 'Admin')) }}
				</div>
			</div>
		</div>

		<div class="form-group ">
			<label class="col-sm-4 control-label required " for="discount_rate_info">Group </label>

			<div class=" col-sm-8 form-group float-label-control">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="ace-icon fa fa-key"></i>
					</span>

					{{ Form::select('group', array( 'Executive' => 'Executive','Admin' => 'Admin','Accounting' => 'Accounting', 'Product' => 'Product', 'Support' => 'Support', 'Orders' => 'Orders'), 'Orders'); }}
				</div>
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-sm-4 required " for="firstname">First Name </label>

			<div class=" col-sm-8 form-group float-label-control  ">
				<div class="clearfix">
					{{ Form::text('firstname', ''); }}
					{{ $errors->first('firstname','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>




		<div class="form-group">
			<label class="control-label col-sm-4 required " for="lastname"> Last Name </label>
			<div class=" col-sm-8 form-group float-label-control  ">
				<div class="clearfix">
					{{ Form::text('lastname', ''); }}
					{{ $errors->first('lastname','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>



		<div class="form-group">
			<label class="control-label col-sm-4 required " for="username"> Username </label>
			<div class=" col-sm-8 form-group float-label-control  ">
				<div class="clearfix">
					{{ Form::text('username', ''); }}
					{{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-4 required " for="email">Email</label>
			<div class=" col-sm-8 form-group float-label-control  ">
				<div class="clearfix">
					{{ Form::text('email', ''); }}
					{{ $errors->first('email','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

	</div>

	<div  class="col-lg-1"> </div>

	<div  class="col-lg-2">




		<div class="form-group">
			<label class="control-label col-sm-12 " for="logo_path">Profile Picture</label>
			<div class=" col-sm-12">
				<div class="clearfix">
					{{ Form::file ('logo_path', array('id'=>'id-input-file-4'))}}
					{{ $errors->first('logo_path','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
				</div>
			</div>
		</div>

	</div>

</div>

<!-- 
<link rel="stylesheet" type="text/css" href="/assets/js/iconselect/css/lib/control/iconselect.css" >
<script type="text/javascript" src="/assets/js/iconselect/lib/control/iconselect.js"></script>
<script type="text/javascript" src="/assets/js/iconselect/lib/iscroll.js"></script>

<script>

	var iconSelect;
        var selectedText;

        window.onload = function(){
            
            selectedText = document.getElementById('selected-text');
            
            document.getElementById('my-icon-select').addEventListener('changed', function(e){
               selectedText.value = iconSelect.getSelectedValue();
            });
            
            iconSelect = new IconSelect("my-icon-select");

		var icons = [];
		icons.push({'iconFilePath':'/img/avatars_2/1.jpg', 'iconValue':'1.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/2.jpg', 'iconValue':'2.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/3.jpg', 'iconValue':'3.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/4.jpg', 'iconValue':'4.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/5.jpg', 'iconValue':'5.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/6.jpg', 'iconValue':'6.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/7.jpg', 'iconValue':'7.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/8.jpg', 'iconValue':'8.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/9.jpg', 'iconValue':'9.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/10.jpg', 'iconValue':'10.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/11.jpg', 'iconValue':'11.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/12.jpg', 'iconValue':'12.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/13.jpg', 'iconValue':'13.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/14.jpg', 'iconValue':'14.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/15.jpg', 'iconValue':'15.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/16.jpg', 'iconValue':'16.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/17.jpg', 'iconValue':'17.jpg'});
		icons.push({'iconFilePath':'/img/avatars_2/18.jpg', 'iconValue':'18.jpg'});
		
		
		

		iconSelect.refresh(icons);

	};

</script>


<div id="my-icon-select"></div>
<input type="text" id="selected-text" name="logo_path" style="width:65px;"> -->



<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
<div class="center">
	<a class="blue btn-lg btn btn-default" href="{{URL::to('/users/')}}"> Cancel </a>
	{{ Form::submit ('Create',array('class'=> 'btn btn-outline btn-lg btn-info'))}}
	<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
</div>
{{ Form::close()}}
@stop

