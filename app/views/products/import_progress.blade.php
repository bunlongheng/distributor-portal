@extends('layouts.main')
@section('content')

@if(isset($response))
<h4>Importing products. Please wait..!</h4>
<div class="hr hr-32 dotted"></div> <!-- _________________________________________________________________________ -->
<div class="col-md-6" style="text-align: center;">
    <img src="/assets/img/rotating-balls-spinner.svg">
    <!-- <div class="progress">
        <div id="import_progress" class="progress-bar" role="progressbar" style="width:0%"></div>
    </div> -->
</div>
<div class="col-md-2">
    <p id="percentage"></p>
</div>
<!-- <div class="hr hr-32 dotted"></div> --> <!-- _________________________________________________________________________ -->

<script type="text/javascript">
    var product_import = {{json_encode($response)}};
    const _token = "{{csrf_token()}}";
</script>

@endif

@stop