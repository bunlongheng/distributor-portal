
@if( App::environment('dev') )<link rel="icon" href="/favicon_logo/dev/favicon.ico" type="image/x-icon" />
@elseif ( App::environment('local') ) <link rel="icon" href="/favicon_logo/local/favicon.ico" type="image/x-icon" />
@else <link rel="icon" href="/favicon_logo/prod/favicon.ico" type="image/x-icon" />
@endif




<!-- IOS icon -->
<link rel="apple-touch-icon" sizes="256x256" href="/img/logo/ios.png">



<script src="/assets/js/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



<script src="/DataTables/media/js/jquery.dataTables.js"></script>



<!-- Extra  -->
<link rel="stylesheet" href="/css/root/font-awesome/font-awesome.min.css">
<link rel="stylesheet" href="/css/root/icomoon/style.css">
<link rel="stylesheet" href="/css/root/hover-master/hover.css">
<link rel="stylesheet" href="/css/root/main.css">
<link rel="stylesheet" href="/css/root/colors.css">
<link rel="stylesheet" href="/css/root/float_label.css">

<link rel="stylesheet" href="/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/public/DataTables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/f2c75b7247b/features/searchHighlight/dataTables.searchHighlight.css">


<!-- Google Fonts  -->
<link href='http://fonts.googleapis.com/css?family=Abel|Merienda+One|Kaushan+Script|Julius+Sans+One|Dancing+Script' rel='stylesheet' type='text/css'>


<style type="text/css">



/*

font-family: 'Abel', sans-serif;
font-family: 'Merienda One', cursive;
font-family: 'Kaushan Script', cursive;
font-family: 'Julius Sans One', sans-serif;
font-family: 'Dancing Script', cursive;

*/



  .form-group > label[class*="col-"] {
    color: #007aff;
    font-size: 13px;

  }

  .required:after {
    content:" *";
    color: red;
    font-size: 13px;

  }

  .form-group .show-data {

    font-size: 14px;


  }

  td:hover {

  }


  #badge{
    background-color:rgba(255,0,0,0);
    font-size: 15px;
    color:#4cd964;
    border: none;
    font-weight: bold;
  }

  .show-data {
    /*padding-top: 50px;*/
    font-size: 15px;
    /*border-bottom: 1px solid silver;*/
    color: black;
  }

  .cool-blue {
    color: #007aff;

  }

  .green-glow:hover{
    box-shadow: 0 0 10px #90bc26;

  }
  .blue-glow:hover{
    box-shadow: 0 0 10px #00CCFF;

  }
  .red-glow:hover{
    box-shadow: 0 0 10px #FF0000;

  }
  .orange-glow:hover{
    box-shadow: 0 0 10px #FF9933;

  }
  .purple-glow:hover{
    box-shadow: 0 0 10px #9933FF;

  }

  .pink-glow:hover{
    box-shadow: 0 0 10px #FF99FF;

  }
  .yellow-glow:hover{
    box-shadow: 0 0 10px #FFFF00;

  }

  .skin-1 .nav-list>li.active>a {
    border-right:1px solid #7bb7e5;
  }
  .skin-1 .nav-list>li>.submenu>li.active>a {
    border-right:1px solid #7bb7e5;
  }
  .skin-1 .nav-list>li>.submenu>li>.submenu>li.active>a {
    border-right:1px solid #7bb7e5;
  }

}


</style>
@section('css')
{{ HTML::style('/assets/css/bootstrap.min.css') }}
{{ HTML::style('/assets/css/font-awesome.min.css') }}
{{ HTML::style('/assets/css/ace-fonts.css') }}
{{ HTML::style('/assets/css/jquery-ui.custom.min.css') }}
{{ HTML::style('/assets/css/datepicker.css') }}
{{ HTML::style('/assets/css/bootstrap-timepicker.css') }}
{{ HTML::style('/assets/css/daterangepicker.css') }}
{{ HTML::style('/assets/css/bootstrap-datetimepicker.css') }}
{{ HTML::style('/assets/css/colorpicker.css') }}
@show

