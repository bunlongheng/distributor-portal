<?php 

$distributors_count = User::where('type','=','Distributor')->get()->count(); 

$pending_count = User::where('type','=','Distributor')->where('active','=', 0)->get()->count();
$active_count = User::where('type','=','Distributor')->where('active','=', 1)->get()->count();
$disable_count = User::where('type','=','Distributor')->where('active','=', 2)->get()->count(); 

$pending_count_percent =  ( $pending_count / $distributors_count ) * 100 ; 
$active_count_percent =  ( $active_count / $distributors_count ) * 100 ; 
$disable_count_percent =  ( $disable_count / $distributors_count ) * 100 ; 


$pending_user_distributors = User::where('type','=','Distributor')->where('active','=', 0)->get();
$active_user_distributors = User::where('type','=','Distributor')->where('active','=', 1)->get();
$disable_user_distributors = User::where('type','=','Distributor')->where('active','=', 2)->get();

?>




<span style="color:#90bc26;font-size:300px;">{{$active_count}}</span>
<span style="color:orange;font-size:300px;">{{$pending_count}}</span>

