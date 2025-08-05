<!DOCTYPE HTML>
<html>
<head>
    <title>Bioss</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    @include('layouts.sub.link')
    <link rel="stylesheet" href="/assets/css/uncompressed/ace.css" id="main-ace-style" />
    <link rel="stylesheet" href="/css/root/float_label.css">
    @include('layouts.sub.ie')
</head>
<body class="login-layout homepage">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="center">
                            <br><br><br><br><br>
                            <img src="/img/logo/logo_.png" alt="logo" width="150px;" /> <br>

                            <h4 class="white lighter" > Welcome to Bioss Distributor Website<br> 
                            </h4>


                            <div class="alert alert-success ">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times">

                                    </i>
                                </button>
                                <h3 class="lighter">


                                    <i class="ace-icon fa fa-check green">

                                    </i>


                                    Please make sure all of your information is  <strong class="blue">
                                    up-to-date
                                </strong>.

                            </h3>




                        </div>

                    </div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">

                                    <div class="col-sm-4">
                                        <h3 class="header black  bigger"><span class="fa fa-lock cool-blue"></span> Set your password </h3>

                                        Password must have minimum of 6 characters<br><br>
                                        <form class="form-horizontal" role="form" action=" {{ URL::route('account-set-password-post')}}" method="post" >

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label required ">Password </label>
                                                <div class="col-sm-9 form-group float-label-control ">
                                                    <span class="input-icon input-icon-right">
                                                        {{ Form::password('password', array('type'=>'password', 'class'=>'form-control','placeholder'=>'Password')); }}
                                                        {{ $errors->first('password','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label required ">Password Again </label>
                                                <div class="col-sm-9 form-group float-label-control ">
                                                    <span class="input-icon input-icon-right">
                                                        {{ Form::password('password_again', array('type'=>'password', 'class'=>'form-control','placeholder'=>'Password Again')); }}
                                                        {{ $errors->first('password_again','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <h3 class="header black  bigger"><span class="icon-quill cool-blue"></span> Registration </h3>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label required  ">Username </label>
                                                <div class="col-sm-9 form-group float-label-control ">
                                                    <span class="input-icon input-icon-right">

                                                        {{ Form::text('username', isset($user->username) ? $user->username : '', array('id'=>'form-field-icon-2')); }}
                                                        {{ $errors->first('username','<a title=":message" class="btn btn-white btn-pink btn-sm"><span class="glyphicon glyphicon-remove "></span> :message </a>') }}
                                                        <!-- <i class="ace-icon fa fa-user green"></i> -->
                                                    </span>
                                                </div>
                                            </div>



                                            <h3 class="header black  bigger"><span class="icon-home3 cool-blue"></span> Company </h3>
                                            @include('distributors.sub.edit.company')


                                            <h3 class="header black  bigger"><span class="fa fa-truck cool-blue"></span> Logistic </h3>
                                            @include('distributors.sub.edit.logistic')



                                        </div>

                                        <div class="col-sm-1 col-sm-4 align-left"></div>
                                        <div class="col-sm-8   align-left ">
                                            <h3 class="header black  bigger"><span class="icon-user cool-blue"></span> Contact </h3>
                                            <div class="col-sm-4  align-left ">
                                                @include('distributors.sub.edit.main_contact')
                                            </div>
                                            <div class="col-sm-4  align-left ">
                                                @include('distributors.sub.edit.sale_contact')
                                            </div>
                                            <div class="col-sm-4  align-left ">
                                                @include('distributors.sub.edit.support_contact')
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-sm-8 align-left"></div>
                                        <div class="col-sm-8   align-left ">
                                            <h3 class="header black  bigger"><span class="cool-blue icon-location2"></span> Address </h3>
                                            <div class="col-sm-6  align-left ">
                                                @include('distributors.sub.edit.billing')
                                            </div>
                                            <div class="col-sm-6  align-left ">
                                                @include('distributors.sub.edit.shipping')
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="clearfix">
                                                <button  type="submit" class="btn btn-lg btn-primary btn-block">
                                                    <span class="bigger-110"> Confirm </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                        </div>
                                    </div>

                                    <br><br><br><br><br><br><br>

                                    {{ Form::token() }}
                                    {{ Form::hidden('code', $code) }}
                                    {{ Form::close() }}
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@include('layouts.sub.script')


</body>
</html>