@extends('layouts.adminapp')

@section('content')

<div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
          @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Your Pages</h3>

            <div class="card-tools">
              <button class="btn btn-success"
              data-toggle="modal" data-target="#AddCode">Create Page</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody><tr>
                <th>Page Title</th>
                <th>Page Slug</th>
                <th>Page Content</th>
                <th>Actions</th>
              </tr>
              @foreach($pages as $page)
              <tr>
                <td>{{$page->title}}</td>
                <td>{{$page->slug}}</td>
                <td><div id="accordion">
                                                    
                                                     
                    <h5 class="mb-0">
                      <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Content...
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        </div>{{$page->content}}
                   
                  </div>
                </td>
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
              
           
             
            </tbody></table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="modal fade" id="AddCode" tabindex="-1" role="dialog" aria-labelledby="AddCode" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddCode">Create New Page</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('PageCrud.store') }}">
            <div class="modal-body">
                
                    <div class="form-group">
                        @csrf
                        <label for="title">Page Title:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Page Slug:</label>
                        <input type="text" class="form-control" name="slug"/>
                    </div>
                    <div class="form-group">
                        <label for="content">Page Content</label>
                        <textarea  type="textarea" class="form-control" name="content"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create Page</button>
            </div>
          </form>
          </div>
        </div>
      </div>
</div>
   
@endsection
