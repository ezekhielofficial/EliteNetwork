@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('ActivationCode.create')}}" class="btn btn-primary">Generate a Code</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Activation Code:</td>
          <td>Expires on:</td>
          <td>Created at:</td>
          <td >Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($ActivationCodes as $ActivationCode)
        @if($expTime >= $ActivationCode->created_at )
        <tr>
            <td>{{$ActivationCode->id}}</td>
            <td>{{$ActivationCode->ActivationCode}}</td>
            <td>{{$expTime->format('M-d-Y')}}</td>
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
        
    </tbody>
    
  </table>
  
<div>
@endsection