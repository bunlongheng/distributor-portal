@extends('layouts.main')
@section('content')

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400' rel='stylesheet' type='text/css'>

    <style type="text/css">


        #exact, #related {

            color: black;
            font-size: 13px;
        }


        #search {

            color: black;
            font-size: 15px;

        }

        .dataTables_filter {
            visibility: hidden;
        }

        .table > tbody > tr > td {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        #exact td:nth-child(3),
        #exact th:nth-child(3),
        #related td:nth-child(3),
        #related th:nth-child(3),
        #exact td:nth-child(5),
        #exact th:nth-child(5),
        #related td:nth-child(5),
        #related th:nth-child(5) {
            text-align: center;
        }


        #exact td:nth-child(4),
        #exact th:nth-child(4),
        #related td:nth-child(4),
        #related th:nth-child(4) {

            font-weight: bold;
            text-align: center;

        }

        .error {
            text-align: center;
            color: black;
            font-size: 15px;

        }

        .ui-autocomplete {
            position: absolute;
            top: 0;
            left: 0;
            cursor: default;
        }

        .ui-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: block;
            outline: 0;
        }

        .ui-menu .ui-menu {
            position: absolute;
        }

        .ui-menu .ui-menu-item {
            margin: 0;
            cursor: pointer;
            /* support: IE10, see #8844 */
            list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
        }

        .ui-menu .ui-menu-item-wrapper {
            position: relative;
            padding: 3px 1em 3px .4em;
        }

        .ui-menu .ui-menu-divider {
            margin: 5px 0;
            height: 0;
            font-size: 0;
            line-height: 0;
            border-width: 1px 0 0 0;
        }

        .ui-menu .ui-state-focus,
        .ui-menu .ui-state-active {
            margin: -1px;
        }

        /* icon support */
        .ui-menu-icons {
            position: relative;
        }

        .ui-menu-icons .ui-menu-item-wrapper {
            padding-left: 2em;
        }

        .highlight-search {
            background-color: #8EBF60;
        }

    </style>


    <div class="container">


        <div class="row">
            <?php
            $x = rand(1, 6);
            if ($x == 1) $y = 'purple';
            elseif ($x == 2) $y = 'primary';
            elseif ($x == 3) $y = 'yellow';
            elseif ($x == 4) $y = 'pink';
            elseif ($x == 5) $y = 'success';
            else            $y = 'warning';
            ?>
            <div class="col-sm-12 center">
                <img src="/img/logo/{{$x}}.jpg" alt="logo" width="200px">
            </div>

            <div class="col-lg-2"></div>

            <div class="col-lg-8 center">
                {{ Form::open(array('action' => 'API_InventoryController@index', 'method' => 'get','id'=>'searchForm')) }}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <input <?php
                                   echo isset($search) ? $search : 'autofocus'; ?>  name="search" value="{{{$search or '' }}}" id="search" placeholder="Enter Catalog Number (eg. bs-0003R)" type="text" class="form-control search-query"/>
                            <span class="input-group-btn">
								<button type="submit" class="btn btn-{{$y}} btn-sm">
									Search
									<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
								</button>
							</span>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>


            {{-- <div class="col-lg-12 text-center">

                <br><br>

                <h3> We are sorry, the inventory check function is temporarily unavailable.<br>
                    We are working hard to fix the issue, and we will notify you once it's back. <br>
                    <br>
                    - The Bioss Team </h3>

                    <img src="http://www.pellicceriabarni.com/wp-content/uploads/2015/07/sito-in-costruzione-e1436222884473.jpg" width="350px" >

            </div> --}}

            <div class="col-sm-12">

                <?php
                if (isset($inventories) AND (count($inventories) > 0)) { ?>
                {{--Pagination--}}
                <div class="center">
                        <?php
                        echo empty($pagination) ? '<br><br>' : "<p style='text-align:center;'>$pagination</p>"; ?>
                </div>
                {{--Exact Table--}}
                <table id="exact" class="table table-hover table-bordered">

                    <thead class="thin-border-bottom">
                    <th>Catalog Number</th>
                    <th>Product Name</th>
                    <th>Qty Available</th>
                    <th>Lead Time</th>

                    </thead>

                    <tbody>


                    @foreach ( $inventories as $inventory)

                        {{--Grey out all the stock = 0;--}}
                            <?php
                            if (substr($inventory->stock, 0)) {
                                $inventory->stock = $inventory->stock;
                            } else {
                                $inventory->stock = "<span class='gray'>" . $inventory->stock . "</span><span style='color:#e99; margin-left:1px; margin-right:-6px;'>*</span>";
                                $notice_needed = true;
                            }
                            ?>
                        <tr>
                            <td>{{    preg_replace('/(' . $search . ')/i', "<span class='highlight-search'>$1</span>", $inventory->sku)}} </td>
                            <td>{{   preg_replace('/(' . $search . ')/i', "<span class='highlight-search'>$1</span>", $inventory->description)}} </td>
                            <td>{{ $inventory->stock }} </td>
                            @if ($inventory->stock > 0)
                                <td>Next day</td>
                            @elseif(stripos($inventory->sku,'BSK')!==false)
                                <td>10-15 business days</td>
                            @elseif(stripos($inventory->sku,'IHC0')!==false)
                                <td>10 business days</td>
                            @elseif(stripos($inventory->sku,'bs-')!==false &&  substr(strtolower($inventory->sku), -1)=='p')
                                <td>10 business days</td>
                            @elseif ($inventory->conjugation == 'Unconjugated')
                                <td>7 business days</td>
                            @else
                                <td>15 business days</td>
                            @endif
                        </tr>

                    @endforeach

                    @if (isset($related_inventories))
                        <tr>
                            <td colspan=5 style="border-left:1px solid #fff; border-right:1px solid #fff; height:10px"></td>
                        </tr>
                        <tr>
                            <td colspan=5 style="background-color:#f0f0f0; color:#707070; font-weight:bold;">Related Products</td>
                        </tr>
                        @foreach ( $related_inventories as $inventory)
                                <?php
                                if (substr($inventory->stock, 0)) {
                                    $inventory->stock = $inventory->stock;
                                } else {
                                    $inventory->stock = "<span class='gray'>" . $inventory->stock . "</span><span style='color:#e99; margin-left:1px; margin-right:-6px;'>*</span>";
                                    $notice_needed = true;
                                }
                                ?>
                            <tr>
                                <td>{{    preg_replace('/(' . $search . ')/i', "<span class='highlight-search'>$1</span>", $inventory->sku)}} </td>
                                <td>{{   preg_replace('/(' . $search . ')/i', "<span class='highlight-search'>$1</span>", $inventory->description)}} </td>
                                <td>{{ $inventory->stock }} </td>
                                @if ($inventory->stock > 0)
                                    <td>Next day</td>
                                @elseif(stripos($inventory->sku,'BSK')!==false)
                                    <td>10-15 business days</td>
                                @elseif(stripos($inventory->sku,'IHC0')!==false)
                                    <td>10 business days</td>
                                @elseif(stripos($inventory->sku,'bs-')!==false &&  substr(strtolower($inventory->sku), -1)=='p')
                                    <td>10 business days</td>
                                @elseif ($inventory->conjugation == 'Unconjugated')
                                    <td>7 business days</td>
                                @else
                                    <td>15 business days</td>
                                @endif

                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
                @if (isset($notice_needed))
                    <div class="pull-right">
                        <span style='color:#e99'>*</span> Products with 0 vials on hand can be ordered with the additional processing time listed above.
                    </div>
                @endif

                    <?php
                } else {
                    echo isset($search) ? "<br><p class='error' > Your search <b>\"$search\"</b> did not match any records.</p>" : '';
                }

                ?>


            </div>
        </div>
    </div>


    <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/features/searchHighlight/dataTables.searchHighlight.min.js" type="text/javascript"></script>

    <script
            src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js"
            integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8="
            crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function () {


            //Bind the Enter botton to submit a form
            $("#search").keypress(function (event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $("form").submit();
                }
            });


            $('.dataTable').dataTable({
                "bLengthChange": false,
                "bInfo": false,
                "bPaginate": false

            });


            jQuery("input#search").autocomplete({
                source: '{{ URL::route('product_suggestions')}}',
                minLength: 3,
                select: function (event, ui) {
                    $("input#search").val(ui.item.label);
                    $("#searchForm").submit();
                }
            });


        });

    </script>

@stop
