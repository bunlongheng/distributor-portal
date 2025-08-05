
@extends('layouts.main')

@section('content')




<!-- Header_________________________________________________________________________  -->
<div class="page-content-area">
  <div class="page-header">
    <h1 class="green">
      Bioss Users
      
    </h1>
  </div>
</div>
<!-- /Header________________________________________________________________________  -->


@if (Auth::user()->type == 'Admin')
<a  href="{{ URL::to('users/create') }}" role="button"  data-toggle="modal" class="btn btn-sm btn-success "> 
  <span class="glyphicon glyphicon-plus"></span> Create </a>
  @endif

  <br><br>



  <div class="row">
  <div class="col-sm-12">


      <table class="table  table-hover table-bordered">

        <thead class="thin-border-bottom">




         <th >#</th>
         <th >Username</th>
         <th >Name</th>
         <th >Email</th>
         <th >Type</th>
         <th >Group</th>
         <th>Status </th>





       </thead>

       <tbody>

         <tr>




           <?php $x = 0 ; ?> 
           @foreach ($users as $user)

           <?php $x = $x + 1 ; ?> 

           @if ( $user->type !== 'Distributor') 

           <td>{{ $x }} </td>
           <td>




            @if( $user->logo_path)

            <img class=" img-circle "  src="/files/logo_path/{{$user->id}}" alt="logo" width="20" >

            @else

                @if($user->group == "Admin")
                <img class=" img-circle" src="/img/default/1.png" alt="logo"  width="20" >
                 @elseif($user->group == "Product")
                <img class=" img-circle" src="/img/default/8.png" alt="logo"  width="20" >
                 @elseif($user->group == "Executive")
                <img class=" img-circle" src="/img/default/7.png" alt="logo"  width="20" >
                 @elseif($user->group == "Accounting")
                <img class=" img-circle" src="/img/default/2.png" alt="logo"  width="20" >
                 @elseif($user->group == "Orders")
                <img class=" img-circle" src="/img/default/11.png" alt="logo"  width="20" >
                @else
                <img class=" img-circle" src="/img/default/12.png" alt="logo"  width="20" >
                @endif

            @endif


            {{ HTML::link('users/' . $user->id, $user->username ) }}


          </td>
          <td>{{ $user->firstname }} {{ $user->lastname }} </td>
          <td>{{ $user->email }} </td>
          <td>{{ $user->type }} </td>
          <td>{{ $user->group }} </td>



          <!-- Status -->
          @if ( $user->active == 1) <td width="100"  ><i title="Active" class="ace-icon fa fa-circle light-green"></i></td>
          @elseif ( $user->active == 0) <td width="100"  ><i title="Pending" class="ace-icon fa fa-circle orange"></i></td>
          @else
          <td width="100"  ><i title="Disable" class="ace-icon fa fa-circle-o silver"></i></td>
          @endif

        </tr> 
        @endif


        @endforeach

        {{ $users->links()}}



      </tbody>
    </table>

  </div>
</div>





@stop












