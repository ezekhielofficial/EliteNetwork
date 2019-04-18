@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Page
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
      <form method="post" action="{{ route('PageCrud.update', $page->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">page title:</label>
              <input type="text" class="form-control" name="title" value="{{$page->title}}"/>
          </div>
          <div class="form-group">
              <label for="slug">page Slug :</label>
              <input type="text" class="form-control" name="slug" value="{{$page->slug}}"/>
          </div>
          <div class="form-group">
              <label for="content">Content :</label>
              <textarea type="text" class="form-control" name="content" value="">{{$page->content}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update page</button>
      </form>
  </div>
</div>
@endsection