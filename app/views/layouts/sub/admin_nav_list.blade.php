<?php
  $request_url = Request::url();
  $admin_settings_open = strpos($request_url, 'export_types')!==FALSE ||
                          strpos($request_url, 'tiers')!==FALSE ||
                          strpos($request_url, 'countries')!==FALSE ||
                          strpos($request_url, 'continents')!==FALSE ||
                          strpos($request_url, 'marketing_material_categories')!==FALSE ||
                          strpos($request_url, 'export_frequencies')!==FALSE;
  $admin_open = strpos($request_url, 'users')!==FALSE ||
                strpos($request_url, 'activity')!==FALSE ||
                $admin_settings_open;
?>
<li>
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-cubes yellow"></i>
    <span class="menu-text white"> Admin </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>

  <ul class="submenu" style="{{{ $admin_open ? 'display:block' : '' }}}">
      {{-- Users --}}
      <li class="{{{ strpos($request_url, 'users')!==FALSE ? 'active' : ''}}}">
        <a href="{{ URL::to('/users')}}">
          <span class="menu-text white"><i class="menu-icon fa fa-user light-green" style="width:15px;"></i> Bioss Users </span>
        </a>
        <b class="arrow"></b>
      </li>
      {{-- Activity --}}
      <li class="{{{ strpos($request_url, 'activity')!==FALSE ? 'active' : ''}}}">
        <a href="{{ URL::to('/activity')}}">
          <span class="menu-text white"><i class="menu-icon fa fa-heartbeat light-red" style="width:15px;"></i> Activity </span>
        </a>
        <b class="arrow"></b>
      </li>
      {{-- Settings --}}
      <li>
        <a href="#" class="dropdown-toggle">
          <span class="menu-text white"><i class="menu-icon fa fa-cog light-grey" style="width:15px;"></i> Settings </span>
          <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu" style="{{{ $admin_settings_open ? 'display:block' : '' }}}">

          <li class="{{{ strpos($request_url, 'export_types')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('export_types') }}" tabindex="-1">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-bar-chart-o purple"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Export Types </div>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="{{{ strpos($request_url, 'tiers')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('tiers') }}">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-star yellow"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Tiers </div>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="{{{ strpos($request_url, 'countries')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('countries') }}">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-flag pink2"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Countries </div>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="{{{ strpos($request_url, 'continents')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('continents') }}">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-globe aqua"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Continents </div>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="{{{ strpos($request_url, 'marketing_material_categories')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('marketing_material_categories') }}">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-bars lime"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Marketing Material Categories </div>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="{{{ strpos($request_url, 'export_frequencies')!==FALSE ? 'active' : ''}}}">
            <a href="{{ URL::to('export_frequencies') }}">
              <div style="width:13px; float:left;">
                <span class=""><i class=" menu-icon fa fa-files-o orange"></i></span>
              </div>
              <div class="menu-text white" style="margin-left:18px;"> Export Frequencies </div>
            </a>
            <b class="arrow"></b>
          </li>
        </ul>
      </li>
  </ul>
</li>