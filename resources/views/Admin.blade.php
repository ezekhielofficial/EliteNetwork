@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        
            <div class="card">
                <div class="card-header">Pages Dashboard</div>
                @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div><br />
              @endif
                @if(auth()->user()->isAdmin == 1)
                
                <div class="card-body">
                    Hi admin, You are logged in!
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>Page Title</td>
                                  <td>Page Slug</td>
                                  <td >Page Content</td>
                                  <td colspan="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->id}}</td>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->slug}}</td>
                                    <td>
                                            <div id="accordion">
                                                    
                                                     
                                                        <h5 class="mb-0">
                                                          <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Content...
                                                          </button>
                                                        </h5>
                                                      </div>
                                                  
                                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            </div>{{$page->content}}</td>
                                                       
                                                      </div>
                                                    
                                    <td><a href="{{ route('PageCrud.edit',$page->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('PageCrud.destroy', $page->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                          </table>
                          <a href="/PageCrud/create" class="btn btn-info btn-sm " role="button">Create new Page</a>
                </div>
                
               
               
            @endif

                
                   
                </div>
            </div>
      
    </div>



@endsection
