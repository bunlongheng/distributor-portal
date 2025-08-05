<!DOCTYPE HTML>

<html>
<head>
	<title>Bioss</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />

	<!--___________________________________________________________________________________________ Ace -->


	@section('css')

	{{ HTML::style('/assets/css/bootstrap.min.css') }}
	{{ HTML::style('/assets/css/font-awesome.min.css') }}
	{{ HTML::style('/assets/css/ace-fonts.css') }}
	{{ HTML::style('/assets/css/ace.min.css') }}
	{{ HTML::style('/assets/css/jquery-ui.custom.min.css') }}
	{{ HTML::style('/assets/css/chosen.css') }}
	{{ HTML::style('/assets/css/datepicker.css') }}
	{{ HTML::style('/assets/css/bootstrap-timepicker.css') }}
	{{ HTML::style('/assets/css/daterangepicker.css') }}
	{{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
	{{ HTML::style('/assets/css/colorpicker.css') }}

	@show


	<link rel="stylesheet" href="/assets/css/ace.min.css" id="main-ace-style" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />




        <!--[if lte IE 9]>
            <link rel="stylesheet" href="/assets/css/ace-part2.min.css" />
            <![endif]-->

            {{ HTML::style('/assets/css/ace-skins.min.css') }}
            {{ HTML::style('/assets/css/ace-rtl.min.css') }}


        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/assets/css/ace-ie.min.css" />
          <![endif]-->


          <!-- ace settings handler -->
          <script src="/assets/js/ace-extra.min.js"></script>

          <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="/assets/js/html5shiv.min.js"></script>
        <script src="/assets/js/respond.min.js"></script>
        <![endif]-->

        <!--___________________________________________________________________________________________ Ace -->






        <style type="text/css">

        	.homepage { 
        		background: url(/img/b/9.jpg) no-repeat center center fixed;
        		-webkit-background-size: cover;
        		-moz-background-size: cover;
        		-o-background-size: cover;
        		background-size: cover;
        	}

        	.label,.glyphicon { margin-right:5px; }

        	.alert-default {
        		color: white;
        		border: 1px solid white ;
        		border-radius: 5px;

        	}

        </style>




    </head>

    <?php $user = User::where('code','=', $code)->firstOrFail(); ?> 

    <body class="login-layout homepage">
    	<div class="main-container">
    		<div class="main-content">
    			<div class="row">
    				<div class="col-sm-10 col-sm-offset-1">
    					<div class="login-container">
    						<div class="center">
    							<br><br><br><br><br>
    							<img src="/img/logo/logo_.png" alt="logo" width="150px;" /> <br><br><br>

    						</div>

    						<div class="space-6"></div>

    						<div class="position-relative">
    							<div id="login-box" class="login-box visible widget-box no-border">
    								<div class="widget-body">
    									<div class="widget-main">
    										<h4 class="header blue lighter bigger">

    											Please Set Your Password 
    										</h4>

    										<div class="space-6"></div>

    										Password must have minimum of 6 characters<br><br>

                                            



                                            <form class="form-horizontal" role="form" action=" {{ URL::route('account-reset-password-post')}}" method="post" >
                                             <fieldset>


                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        {{ Form::text('username', isset($user->username) ? $user->username : '', array('class'=>'form-control')); }}
                                                        {{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                        
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>


                                               
                                                <label class="block clearfix">
                                                 <span class="block input-icon input-icon-right">
                                                  <input required type="password" class="form-control" name="password" placeholder="Password"
                                                  />
                                                  <i class="ace-icon fa fa-lock"></i>
                                              </span>
                                          </label>
                                          {{ $errors->first('password','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}

                                         
                                          <label class="block clearfix">
                                             <span class="block input-icon input-icon-right">
                                              <input required type="password" class="form-control" name="password_again" placeholder="Password Again"
                                              />
                                              <i class="ace-icon fa fa-lock"></i>
                                          </span>
                                      </label>
                                      {{ $errors->first('password_again','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}



                                      <div class="space"></div>

                                      <div class="clearfix">


                                         <button  type="submit" class="width-35 pull-right btn btn-sm btn-primary">

                                          <span class="bigger-110"> Set </span>
                                      </button>
                                  </div>

                                  <div class="space-4"></div>
                              </fieldset>

                              {{ Form::token() }}
                              {{ Form::hidden('code', $code) }}
                              {{ Form::close() }}


                          </div>


                      </div>
                  </div>









