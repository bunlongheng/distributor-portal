<!DOCTYPE HTML>
<html>
  <head>
  
 @if( App::environment('dev') ) <title>Development</title>
 @elseif ( App::environment('local') ) <title>Local</title>
 @else <title>Bioss Distributor</title>
 @endif

    
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    @include('layouts.sub.link')
    <link rel="stylesheet" href="/assets/css/uncompressed/ace.css" id="main-ace-style" />
    @include('layouts.sub.ie')
    
  </head>
  <body class="skin-1" id="ace-settings-hover">
    
    @include('layouts.navigation')
    
    <div class="main-container" id="main-container">
      @include('layouts.sub.side_bar')
      @include('layouts.sub.main_content')
    </div>
    
    @include('layouts.sub.script')
    
  </body>
</html>