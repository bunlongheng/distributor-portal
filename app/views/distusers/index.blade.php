@extends('layouts.main')
@section('content')


    <div class="col-sm-12 ">

        <a href="{{ URL::to('distusers/'.$dist->id.'/create') }}" class="btn btn-sm btn-warning "> <span
                    class="glyphicon glyphicon-user"></span> Create </a>


    </div> <br><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="widget-box transparent">
                <div class="widget-body">
                    <div class="widget-main no-padding">

                        <table class="table table-hover" id="list_view" class="display" cellspacing="0" width="100%">
                            <thead class="thin-border-bottom ">
                            <th width="120">Username</th>
                            <th width="120">Email</th>
                            <th width="150">Actions</th>


                            </thead>
                            <tbody>

                            @foreach ($list as $item)






                                <tr class=" ">

                                    {{-- Company Name--}}
                                    <td>
                                        {{$item->user->username}}
                                    </td>


                                    {{-- Company Logo --}}
                                    <td>
                                        {{$item->user->email}}
                                    </td>

                                    <td>


                                        <a href="/distusers/delete/<?= $item->distributor_id ?>/<?= $item->user_id ?>">Delete User</a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    {{--This script is for auto hightlight--}}
                    <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js" type="text/javascript"></script>
                    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/features/searchHighlight/dataTables.searchHighlight.min.js"
                            type="text/javascript"></script>


                    {{--Setting for input search box in list view--}}
                    <script type="text/javascript">


                        $('#list_view').dataTable({

                            "lengthMenu": [100],
                            "bLengthChange": false,
                            "searchHighlight": true


                        });


                    </script>




@stop