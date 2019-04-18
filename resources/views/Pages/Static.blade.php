
@extends('layouts.app')
<body>
    @section('content')  
  
        
        <div class="jumbotron text-center">
    <div class="container">
      <h1 class="display-3">{{$page->title}}</h1>
      
      <p></p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>
  <hr>
  <section class="text-center">
    <div class="container">
     
      <p class="lead text-muted">{{$page->content}}</p>
      
    </div>
  </section>
    @endsection
   
</body>


