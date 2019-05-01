@extends('layouts.adminapp')

@section('content')

<div class="card mt-5">
  <div class="card-header">
    Create ActivationCode
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('ActivationCode.store') }}">
          <div class="form-group">
              @csrf
              <label for="ActivationCode">ActivationCode:</label>
              <input type="text" class="form-control"  id="demo" name="ActivationCode" value="{{$random}}"readonly>
          </div>
          
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{ route('ActivationCode.create') }}" class="btn btn-info" role="button">Generate New Code</a>
          
      </form>
                      
  </div>
</div>

@endsection