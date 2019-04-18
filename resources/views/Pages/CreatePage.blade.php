@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header text-center ">
      <div class="text-uppercase">
          <h3>Add Page</h3>
         
    </div>
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
      <form method="post" action="{{ route('PageCrud.store') }}">
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
          <button type="submit" class="btn btn-primary">Create Page</button>
      </form>
  </div>
</div>

@endsection