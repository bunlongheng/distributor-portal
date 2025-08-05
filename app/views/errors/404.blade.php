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

    			<div class="error-container">
    				<div class="well">
    					<h1 class="grey lighter smaller text-xl">
    						<span class="blue bigger-125">
    							<i class="ace-icon fa fa-sitemap"></i>
    							404
    						</span>
    						Page Not Found
    					</h1>

    					<hr />
    					<h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

    					<div>


    						<div class="space"></div>
    						<h4 class="smaller">Did you try ?</h4>

    						<ul class="list-unstyled spaced inline bigger-110 margin-15">
    							<li>
    								<i class="ace-icon fa fa-hand-o-right blue bigger-125"></i>
    								Re-check the url for typos
    							</li>


    						</ul>
    					</div>

    					<hr />
    					<div class="space"></div>

    					<div class="center">

    						<a href="/" class="btn btn-primary">
    							<i class="ace-icon fa fa-home bigger-125"></i>
    							Go Home
    						</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
