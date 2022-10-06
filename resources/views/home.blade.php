@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-1">{{ __('User Dashboard') }}</h2>
                            <p>{{ __('You are logged in!') }}</p>
                            <div class="card-body">
                                <a class="btn mt-3 btn-primary" href="{{ route('post.create') }}"> Add Post</a>
                                <table class="table table-stripped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sr.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post )
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->description }}</td>
                                            <td>{{ $post->user->name }}</td>

                                            <td>
                                                <a href="{{ route('post.edit',$post->id) }}"> <button type="button" class="btn btn-success">Edit</button></a>
                                                <a href="{{ route('post.delete',$post->id) }}"> <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
