@extends('layouts.main')
@section('content')


<div class="col-sm-12 ">

  <a href="{{ URL::to('distributors/create') }}" class="btn btn-sm btn-warning "> <span class="glyphicon glyphicon-plus"></span> Create </a>


  <a data-rel="tooltip" data-original-title="Continent View" data-placement="left" href="{{ URL::to('distributors/') }}" class="pull-right btn btn-sm btn-white btn-info  "> <span class=" glyphicon  glyphicon-globe "> </span></a>

</div> <br><br><br>
<div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding" >

          <table class="table table-hover" id="list_view" class="display" cellspacing="0" width="100%">
            <thead class="thin-border-bottom ">
              <th width="120" >Company</th>
              <th width="120" >Logo</th>
              <th width="150" >HQ Country</th>
              <th width="100" >Type </th>
              <th width="100" >Discount </th>
              <th width="100">Sale Region </th>
              <th width="100" >Tier </th>
              <th width="100" >Frequency</th>
              <th width="100">Status </th>
              <th width="100" >Member Since </th>



            </thead>
            <tbody>

              @foreach ($distributors as $distributor)



                  <?php $export_type = $distributor->export_type()->first(); ?>
                  <?php $country = $distributor->country()->first(); ?>
                  <?php $tier = $distributor->tier()->first(); ?>


                  @if ($distributor->active == 2)
                  <tr class=" silver">
                    @else
                    <tr >
                      @endif


                      {{-- Company Name--}}
                      <td>
                        <div class="po-markup"><a href="/distributors/{{$distributor->id}}" class="po-link">{{ $distributor->company_name }}</a>
                        </div>
                      </td>


                      {{-- Company Logo --}}
                      <td>
                        <a href="http://{{ str_replace("http://","",$distributor->url) }}" target="_blank" class="po-link">
                          @if( $distributor->logo_path)
                            <img id="Company Logo" class="lazy" data-src="/files/thumbnail_path/{{$distributor->id}}" alt="" height="30px" width="80px" >
                          @else
                            <img id="Default Logo" class="lazy" data-src="/img/default.PNG" alt="" width="80px" >
                          @endif
                        </a>
                      </td>


                      {{--Country Flag > Name--}}
                      <td><img src="/img/flags_3/flags/48/{{ $country->name }}.png  " width="20px" height="20px"> {{ $country->name }}  </td>
                      <td>{{ $distributor->type }} </td>
                      <td>{{ $distributor->discount_rate_info }} </td>
                      <td>{{ $distributor->sale_region }} </td>
                      <td>{{ $distributor->tier_id }} </td>
                      <td>{{ $distributor->export_frequency()->first()->name }} </td>



                        {{--Status--}}
                        @if ( $distributor->active == 1) <td width="100"  ><i title="Active" class="ace-icon fa fa-circle light-green"></i></td>
                        @elseif ( $distributor->active == 0) <td width="100"  ><i title="Pending" class="ace-icon fa fa-circle orange"></i></td>
                        @else
                        <td width="100"  ><i title="Disable" class="ace-icon fa fa-circle-o silver"></i></td>
                        @endif



                      <td>{{ $distributor->start_date }} </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>


            {{--This script is for auto hightlight--}}
            <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js" type="text/javascript"></script>
            <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/features/searchHighlight/dataTables.searchHighlight.min.js" type="text/javascript"></script>



            {{--Setting for input search box in list view--}}
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

            <script type="text/javascript">



                $('#list_view').dataTable( {

                  "lengthMenu": [ 100 ],
                  "bLengthChange": false,
                  "searchHighlight": true


                });

                $(function(){
                  $('.lazy').lazy();
                })


            </script>




            @stop