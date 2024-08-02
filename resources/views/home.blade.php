@extends('app')
@section('section')
    <style>

        .img-fluid {
            max-width:50%;
            height: auto;
        }

    </style>
<div class="container">
    <div>
        <a href="{{url('/create-post')}}" class="btn btn-primary">Create Post</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{Str::limit($post->content,50)}}</td>
                <td><img src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid" alt="Post Image"></td>
                <td><a href="{{url('edit',$post->id)}}">Edit</a></td>
                <td><a href="{{url('delete',$post->id)}}">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>


@endsection
