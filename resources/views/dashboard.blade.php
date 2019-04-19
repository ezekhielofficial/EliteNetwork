@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div><br />
              @endif
                @if(auth()->user()->isAdmin == 1)
                
                <div class="card-body">
                        <div class="text-center">
                                <a href="{{ route('ActivationCode.create')}}" class="btn btn-primary">Generate a Code</a>
                                <a href="/PageCrud" class="btn btn-primary" role="button">Page Dashboard</a>
                                <a class="btn btn-primary" href="{{route('ActivationCode.index')}}"> My Activation Codes</a> 
                             <br>
                                Hi admin, You are logged in!
                            </div>
                    

                    
                   
                </div>
                
                              
                
                @else
               
            

                <div class="card-body">
                        <a href="{{ route('ActivationCode.create')}}" class="btn btn-primary">Generate a Code</a>
                    Hi muggle, You are logged in!
                </div>
               
            @endif

                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
