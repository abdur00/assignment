@extends('layouts.app')

@section('content')
<form action="{{ route('post.update',$post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" value="{{ $post->title }}" class="form-control" name="title" id="title" placeholder="Enter Your Post">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $post->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Update</button>
</form>

@endsection

