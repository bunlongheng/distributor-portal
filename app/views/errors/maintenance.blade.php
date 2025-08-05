<!DOCTYPE HTML>

<html>
<head>
	<title>404</title>

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
	{{ HTML::style('/assets/css/uncompressed/colors.css') }}


	@show


	<link rel="stylesheet" href="/assets/css/ace.min.css" id="main-ace-style" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />

	@if( App::environment('dev') )<link rel="icon" href="/favicon_logo/dev/favicon.ico" type="image/x-icon" />
	@elseif ( App::environment('local') ) <link rel="icon" href="/favicon_logo/local/favicon.ico" type="image/x-icon" />
	@else <link rel="icon" href="/favicon_logo/prod/favicon.ico" type="image/x-icon" />
	@endif




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

        	.centerbox {
        		text-align: center;

        	}

        	.text-xl{
        		font-size: 80px !important;
        	}


        </style>

    </head>
    <div class="page-content-area centerbox">
    	<div class="row">
    		<div class="col-xs-12">
    			<!-- PAGE CONTENT BEGINS -->


    			<br><br><br><br><br><br><br><br><br><br>





    			<div class="error-container">
    				<div class="well">
    					<h1 class="grey lighter smaller text-xl">
    						<span class="green bigger-125">
    							<i class="ace-icon fa fa-wrench icon-animated-wrench "></i>
    							We'll
    						</span>
    						Be Back Soon.
    					</h1>

    					<hr />
    					<h3 class="lighter smaller">We're busy updating the site for you and will be back shortly</h3>
    					<h3 class="lighter smaller">Thanks for your patience.</h3>

    					<br><br>

    					<img id="image1" src="/img/logo/logo.png" alt="logo" width="50px;" /> 

    					
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
