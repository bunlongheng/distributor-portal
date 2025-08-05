@extends('layouts.main')
@section('content')
<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100' rel='stylesheet' type='text/css'>
@include('marketing_materials.style')
@if(Auth::user()->type == "Admin")
<a href="{{ URL::to('marketing_materials/create') }}" class="btn btn-sm btn-primary ">
	<span class="glyphicon glyphicon-plus"></span> Marketing Material</a> <br>
	
	@foreach ( MarketingMaterialCategory::orderBy('order','asc')->get() as $mmc )
	<?php
	$count =  MarketingMaterial::where('marketing_materials_category_id','=', $mmc->id )->get()->count();
	?>
	<h2 class=" title lighter"></i>&nbsp; {{{ $mmc->name or '' }}} &nbsp;<small class="orange">({{$count}})</small></h2>
	<div class="slick">
		@foreach ( MarketingMaterial::where('marketing_materials_category_id','=', $mmc->id )->orderBy('created_at','desc')->get() as $marketing_material)
		<div class="col-sm-2">
			<div class="_hover " style="background: transparent;">
				<p style="text-align:center;">
					<img class="img-responsive" src="/marketing_materials/{{$marketing_material->id}}/download/thumb_path" alt="">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h4 class="title lighter" style="padding:20px;border-radius: 10px;">{{{ $marketing_material->title or '' }}}</h4>
						<p>
							<span>
								<a class="btn-1 pull" href="/marketing_materials/{{$marketing_material->id}}/download/media_path">
									Download
								</a>
							</span>
							&nbsp;&nbsp;&nbsp;

							<span>
								<a class="btn-2" href="{{ URL::to('marketing_materials/'.$marketing_material->id.'/edit') }}">
									Edit
								</a>
							</span>
						</p>
						<br>
						
						
						@if( $marketing_material->resolution )
						<p class="white">Resolution <br> <span class="cool-blue number-lg"> {{ $marketing_material->resolution }}</span></p>
						@endif
						
						@if( $marketing_material->print_size )
						<p class="white ">Max Print Size <br> <span class="cool-blue number-lg"> {{ $marketing_material->print_size }}</span></p>
						@endif
						<span class=" label-{{ $marketing_material->ext }}-o"> {{ strtoupper($marketing_material->ext) }}</span>
					</div>
				</div>
			</div>
		</div>
		
		@endforeach
		<div class="col-sm-1"></div>
	</div>
	<hr style="height:1px;border:none;color:#FF8000;background-color:#FF8000;" />
	<!-- <img  class="img-responsive center" src="/img/hr/1.png" alt=""> -->
	@endforeach
	@else
	
	
	
	<!-- Block Title -->
	@foreach ( MarketingMaterialCategory::orderBy('order','asc')->get() as $mmc )
	<?php
	$count =  MarketingMaterial::where('marketing_materials_category_id','=', $mmc->id )->get()->count();
	?>
	<h2 class=" title lighter"></i>&nbsp; {{{ $mmc->name or '' }}} &nbsp;<small class="orange">({{$count}})</small></h2>
	<div class="row slick">
		@foreach ( MarketingMaterial::where('marketing_materials_category_id','=', $mmc->id )->orderBy('created_at','desc')->get() as $marketing_material)
		<div class="col-sm-2">
			<div class="_hover " style="background: transparent;">
				<p style="text-align:center;">
					<img class="img-responsive" src="/marketing_materials/{{$marketing_material->id}}/download/thumb_path" alt="">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h4 class="title lighter" style="padding:20px;border-radius: 10px;">{{{ $marketing_material->title or '' }}}</h4>
						<p><span><a class="btn-1" href="/marketing_materials/{{$marketing_material->id}}/download/media_path">
							Download
						</a> </span></p> <br>
						
						
						@if( $marketing_material->resolution )
						<p class="white">Resolution <br> <span class="cool-blue number-lg"> {{ $marketing_material->resolution }}</span></p>
						@endif
						
						@if( $marketing_material->print_size )
						<p class="white ">Max Print Size <br> <span class="cool-blue number-lg"> {{ $marketing_material->print_size }}</span></p>
						@endif
						<span class=" label-{{ $marketing_material->ext }}-o"> {{ strtoupper($marketing_material->ext) }}</span>
					</div>
				</div>
			</div>
		</div>
		<!-- Ecommerce UI #6 -->
		@endforeach
		<div class="col-sm-1"></div>
	</div>
	<hr style="height:1px;border:none;color:#FF8000;background-color:#FF8000;" />
	<!-- <img  class="img-responsive center" src="/img/hr/1.png" alt=""> -->
	@endforeach
	@endif
	

	<script type="text/javascript" src="/slick/slick.js"></script>
	

	<script type="text/javascript">
		$( document ).ready(function() {
			$('.slick').slick({
				dots: true,
				infinite: false,
				speed: 300,
				slidesToShow: 5,
				slidesToScroll: 5,
				responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				]
			});
		});
	</script>
	

	@stop