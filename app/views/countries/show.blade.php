@extends('layouts.main')
@section('content')
<style type="text/css">
	/*CSS*/
</style>

<a href="{{ URL::to('countries/'.$country->id.'/edit') }}" type="button" class="btn btn-warning btn-sm " title="Edit">
	Edit
</a>

<br><br>


Country Name : {{ $country->name }}<br>
Country Code : {{ $country->continent_code }}<br>
<img width="50px" height="50px" src="/img/flags_3/flags/48/{{ $country->name }}.png">

@stop