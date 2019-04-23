@extends('layouts.userapp')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
            <div class="card mt-5">
                    
                <div class="card-header text-center">Dashboard</div>
                @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div><br />
              @endif
                
                <div class="card-body">
                    Hi {{Auth::user()->name}},  You are logged in Welcome To Your Dashboard!
                </div>
    
                </div>
            </div>
        </div>
    </div>

@endsection
