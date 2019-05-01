@extends('layouts.adminapp')

@section('content')

<div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Activation Codes</h3>

          <div class="card-tools">
            <a href="/ActivationCode/create" class="btn btn-success">Create New Activation Code</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody><tr>
                <th>Activation Code:</th>
                <th>Expires on:</th>
                <th>Created at:</th>
                <th >Action</th>
            </tr>

            @foreach($ActivationCodes as $ActivationCode)

            @if((Carbon\Carbon::now()->diffInMonths($ActivationCode->created_at) <= 6) )
            <tr>

                <td>{{$ActivationCode->ActivationCode}}</td>
                <td>{{$ActivationCode->created_at->addMonths(6)->format('M-d-Y')}}</td>
                <td>{{$ActivationCode->created_at->format('M-d-Y')}}</td>
                <td>
                    <form action="{{ route('ActivationCode.destroy', $ActivationCode->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @endif


            @endforeach
          </tbody></table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expired Activation Codes</h3>

          <div class="card-tools">

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody>
            @foreach($ActivationCodes as $ActivationCode)
            @if((Carbon\Carbon::now()->diffInMonths($ActivationCode->created_at) >= 6) )
            <tr>

                <td>{{$ActivationCode->ActivationCode}}</td>
                <td>{{$ActivationCode->created_at->addMonths(6)->format('M-d-Y')}}</td>
                <td>{{$ActivationCode->created_at->format('M-d-Y')}}</td>
                <td>
                    <form action="{{ route('ActivationCode.destroy', $ActivationCode->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
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
