@extends('layouts.app')

@section('content')
<div class="container">
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
            <div class="card">
                    
                <div class="card-header">Dashboard</div>
                @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div><br />
              @endif
                
                <div class="card-body">
                        <a href="{{ route('ActivationCode.create')}}" class="btn btn-primary">Generate a Code</a>
                    Hi muggle, You are logged in!
                </div>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <th>Activation Code</th>
                        <th>Created at</th>  
                        <th>Expired on</th> 
                    </tr>

               
                @foreach($User_code as $code)

                <tr>
                        <th>{{$code->ActivationCode}}</th> 
                        <th>{{$code->created_at}}</th> 
                        <th>{{$code->ActivationCode}}</th> 
                </tr>
                @endforeach
            </table>


               
           

                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
