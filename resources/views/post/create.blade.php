@extends('layouts.app')
@section('content')
<form action="{{ route('post.store') }}" method="POST"  >
    @csrf

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" name="title" id="name" placeholder="Enter Your Project">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="" placeholder="Enter Your Description">
      </div>
      <button id='dess' type="submit" class="btn mt-3 btn-primary">Create</button>
</form>

@endsection
