@extends('layouts.adminapp')


@section('content')
<div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Activated Connections</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody><tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
       
            </tr>
            @foreach($myConnections as $connection)
            @if($connection->activatecode != null)
            <tr>
              <td>{{$connection->mlmid}}</td>
              <td>{{$connection->name}}</td>
              <td>{{$connection->email}}</td>
              <td>User Activated</td>
            </tr> 
            @endif
            @endforeach
          </tbody></table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



      <div class="card mt-5">
        <div class="card-header">
          <h3 class="card-title">Disabled Connections</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody><tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
            @foreach($myConnections as $connection)
            @if($connection->activatecode == null)
            <tr>
              <td>{{$connection->mlmid}}</td>
              <td>{{$connection->name}}</td>
              <td>{{$connection->email}}</td>
              <td>User Not Activated</td>
           
              
            </tr>
             @endif
            @endforeach
          </tbody></table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>






@endsection