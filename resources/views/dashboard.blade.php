@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(auth()->user()->isAdmin == 1)
                
                <div class="card-body">
                    Hi admin, You are logged in!
                </div>
                
                @else
               
            

                <div class="card-body">
                    Hi muggle, You are logged in!
                </div>
               
            @endif

                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
