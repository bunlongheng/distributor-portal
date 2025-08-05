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


            
        </style>








    </head>

    <div class="navbar-fixed-top align-right">
        <br />
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    @if ($message = Session::get('success'))

                    <div class="alert alert-default center">
                        <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times white"></i></button>
                        <i class="ace-icon fa fa-check green "></i> {{ nl2br($message) }}
                    </div>

                    @elseif ($message = Session::get('error'))

                    <div class="alert alert-default center">
                        <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times white"></i></button>
                        <i class="ace-icon fa fa-bolt red"></i> {{ nl2br($message) }}
                    </div>


                    @endif
                </div>

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>


    <body class="login-layout homepage">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <br><br><br><br><br>
                                <img id="image1" src="/img/logo/logo_.png" alt="logo" width="150px;" /> 
                                <img id="image2" src="/img/logo/logo_2.png" alt="logo" width="150px;" /> 
                                
                                
                                
                                
                                <br><br><br>


                            </div>

                            <div class="space-6"></div>







                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">

                                                Please Enter Your Information
                                            </h4>

                                            <div class="space-6"></div>


                                            {{ Form::open(array('url' => '/account/sign-in', 'class' => 'form-horizontal')) }}



                                            <fieldset>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                       {{ Form::text('username','', array('class'=>'form-control','placeholder'=>'Username','id'=>'username')); }}
                                                       {{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                       <i class="ace-icon fa fa-user"></i>
                                                   </span>
                                               </label>

                                               
                                               <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" id="password"
                                                    />{{ $errors->first('password','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                    <i class="ace-icon fa fa-lock"></i>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input name="remember" id="remember" type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label>

                                                <button  type="submit" class="width-35 pull-right btn btn-sm btn-primary">

                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>

                                        {{Form::close()}}


                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix center">
                                        <div>
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link center">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                forgot password
                                            </a>
                                        </div>

                                                <!-- <div>
                                                    <a href="#" data-target="#signup-box" class="user-signup-link">
                                                        Register
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div><!-- /.widget-body -->
                                    </div><!-- /.login-box -->



                                    <!-- Retrieve Password _____________________________________________________________________________________ -->


                                    <div id="forgot-box" class="forgot-box widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h4 class="header red lighter bigger">

                                                    Retrieve Password
                                                </h4>

                                                Forgot your password? Enter your email below and we'll send you a link to reset it. <br><br>

                                                <form class="form-horizontal" role="form" action=" {{ URL::route('account-forgot-password-post')}}" method="post" >
                                                    <fieldset>
                                                        @if ($errors->has('email')){{ $errors->first('email')}} @endif
                                                        <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input type="email" class="form-control" placeholder="Email" 
                                                                required placeholder="Email" name="email" {{ ( Input::old('email')) ? 'value="'.e(Input::old('email')).'"' : '' }}/>
                                                                <i class="ace-icon fa fa-envelope"></i>
                                                            </span>
                                                        </label>

                                                        <div class="clearfix">
                                                            <button type="submit" class="width-65 pull-right btn btn-sm btn-danger">

                                                                <span class="bigger-110">Reset Password</span>
                                                            </button>
                                                        </div>
                                                    </fieldset>
                                                    {{ Form::token() }}</form> 
                                                </div><!-- /.widget-main -->

                                                <div class="toolbar center">
                                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                                        Back to login
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div><!-- /.widget-body -->
                                        </div><!-- /.forgot-box -->
                                    </div><!-- /.position-relative -->

                                <!-- <div class="navbar-fixed-top align-right">
                                    <br />
                                    &nbsp;
                                    <a id="btn-login-dark" href="#">Dark</a>
                                    &nbsp;
                                    <span class="blue">/</span>
                                    &nbsp;
                                    <a id="btn-login-blur" href="#">Blur</a>
                                    &nbsp;
                                    <span class="blue">/</span>
                                    &nbsp;
                                    <a id="btn-login-light" href="#">Light</a>
                                    &nbsp; &nbsp; &nbsp;
                                </div> -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.main-content -->
            </div><!-- /.main-container -->


            <!-- basic scripts -->

            <!--[if !IE]> -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <!-- <![endif]-->

        <!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
     $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible');//hide others
                $(target).addClass('visible');//show target
            });
 });



            //you don't need this, just used for changing background
            jQuery(function($) {
             $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
            });
             $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
            });
             $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');
                
                e.preventDefault();
            });
            
            
            $("#image2").hide();

$('#username').on('input', function (event) {
    $("#image1").hide();
    $("#image2").show();
    
});

$('#password').on('input', function (event) {
    $("#image1").hide();
    $("#image2").show();
    
});




         });
        </script>
        
        




        {{ HTML::script('js/jquery-1.11.0.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/float_label.js') }}
        {{ HTML::script('js/skel-panels.min.js') }}
        {{ HTML::script('js/skel.min.js') }}
        {{ HTML::script('js/config.js') }}

    </body>

    </html>



