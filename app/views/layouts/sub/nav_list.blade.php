{{-- Visibility :  All --}}
{{--Dashboards--}}
<li class="{{{ strpos(Request::url(), 'dashboard')!==FALSE ? 'active' : ''}}}">
  <a href="{{ URL::to('/dashboard')}}">
    <i class="menu-icon fa fa-dashboard blue"></i>
    <span class="menu-text white "> Dashboard </span>
  </a>
  <b class="arrow"></b>
</li>
{{----------------------------------------------------------------------------------}}

{{-- Visibility :  Admin + Bioss --}}
{{--Distributors--}}
@if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' )

<li class="{{{ strpos(Request::url(), 'distributors')!==FALSE ? 'active' : ''}}}">
  <a href="{{ URL::to('/distributors/list_view')}}">
    <i class="menu-icon fa  fa-home orange"></i>
    <span class="menu-text white"> Distributors </span>

  </a>
  <b class="arrow"></b>
</li>

@endif

{{----------------------------------------------------------------------------------}}

{{-- Visibility :  All --}}
{{--Catalog Downloads--}}
<li class="{{{ strpos(Request::url(), 'catalog_downloads')!==FALSE ? 'active' : ''}}} ">
  <a href="{{ URL::to('catalog_downloads') }}">

    @if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' )
      <i class="menu-icon fa fa-cloud-upload green"></i>
      <span class="menu-text white"> Catalog Uploads </span>
    @else
      <i class="menu-icon fa fa-cloud-download green"></i>
      <span class="menu-text white"> Catalog Downloads </span>
    @endif

  </a>
  <b class="arrow"></b>
</li>

{{----------------------------------------------------------------------------------}}

{{-- Visibility :  Admin + Bioss + Non Exclusive + Exclusive --}}
@if ((Auth::user()->type) == 'Bioss' OR (Auth::user()->type) == 'Admin' OR Auth::user()->distObj()->type == "Non Exclusive" OR Auth::user()->distObj()->type == "Exclusive" )

    {{--Marketing Materials--}}
    <li class="{{{ strpos(Request::url(), 'marketing_materials')!==FALSE ? 'active' : ''}}}">
      <a href="{{ URL::to('/marketing_materials')}}">
        <i class="menu-icon glyphicon  glyphicon-picture light-blue "></i>
        <span class="menu-text white"> Marketing Materials </span>
      </a>
      <b class="arrow"></b>
    </li>

    {{--Product Inventory--}}
    <li class="{{{ strpos(Request::url(), 'product_inventory')!==FALSE ? 'active' : ''}}}">
      <a href="{{ URL::to('/product_inventory')}}">
         <i class="menu-icon fa fa-search red "></i>
        <span class="menu-text white"> Product Inventory </span>
      </a>
      <b class="arrow"></b>
    </li>
@endif

{{-- Visibility :  Distributor --}}
@if ((Auth::user()->type) == 'Distributor')
    <li class="{{{ strpos(Request::url(), 'marketing_materials')!==FALSE ? 'active' : ''}}}">
      <a href="{{ URL::to('/marketing_materials')}}">
        <i class="menu-icon glyphicon  glyphicon-picture light-blue "></i>
        <span class="menu-text white"> Marketing Materials </span>
      </a>
      <b class="arrow"></b>
    </li>
@endif

{{----------------------------------------------------------------------------------}}

{{-- Visibility :  Only for Admin --}}
{{--Product Uploads--}}
@if ((Auth::user()->type) == 'Admin')
<li class="{{{ strpos(Request::url(), 'product_uploads')!==FALSE ? 'active' : ''}}} ">
  <a href="{{ URL::to('product_uploads') }}">
      <i class="menu-icon fa fa-cloud-upload green"></i>
      <span class="menu-text white"> Product Uploads </span>
  </a>
  <b class="arrow"></b>
</li>
@endif
