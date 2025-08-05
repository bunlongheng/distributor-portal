<td width="120" >
  <div class="po-markup">
    <a href="/distributors/{{$distributor->id}}">{{ $distributor->company_name }}</a>
  </div>
</td>
<td width="120" >
<a href="http://{{ str_replace("http://","",$distributor->url); }}" target="_blank" >
    @if( $distributor->logo_path)
    <img id="Company Logo" src="/files/logo_path/{{$distributor->id}}" alt="logo" height="30px" width="80px" >
    @else
    <img id="Default Logo" src="/img/default.PNG" alt="logo" width="80px" >
    @endif
  </a>
</td>
<td width="100" >{{ $distributor->type }} </td>
<td width="150" >{{ $distributor->sale_region }} </td>
<td width="100" >{{ $distributor->start_date }} </td>
<td width="50" >{{ $distributor->tier_id }} </td>
<td width="100" >{{ $distributor->discount_rate_info }} </td>
<td width="130" >{{ $distributor->export_frequency()->first()->name }} </td>
@if ( $distributor->active == 1) <td width="100"  ><i title="Active" class="ace-icon fa fa-circle light-green"></i></td>
@elseif ( $distributor->active == 0) <td width="100"  ><i title="Pending" class="ace-icon fa fa-circle orange"></i></td>
@else
<td width="100"  ><i title="Disable" class="ace-icon fa fa-circle-o silver"></i></td>
@endif

