

<?php 
$country = $distributor->country()->first();  
$country_count = Distributor::where('country_id', '=', $country->id)->get()->count() 
?>


<span class="border_ text-center float-shadow">
		
		{{ $country->name }} 
		<img src="/img/flags_3/flags/48/{{ $country->name }}.png  " width="20px" height="20px"> 
		<span class="orange">
			({{$country_count}})
		</span> 
	</span>



