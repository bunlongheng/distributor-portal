<div class="col-sm-12 ">

@if(Auth::user()->type == "Admin")	
	<a href="{{ URL::to('distributors/create') }}" class="btn btn-sm btn-warning "> <span class="glyphicon glyphicon-plus"></span> Create </a>
@endif
	<a data-rel="tooltip" data-original-title="List View" data-placement="left" href="{{ URL::to('distributors/list_view') }}" class="pull-right btn btn-sm btn-white btn-info  "> <span class=" glyphicon  glyphicon-list-alt "> </span></a>


	<ul  id="nav" class="pull-right">
	@foreach ($continents as $continent)
			<li>
				<a href="#{{$continent->name}}" class="sticky-{{$continent->code}}">
					{{$continent->name}}
				</a>
			</li>
	@endforeach
	</ul>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	
</div>