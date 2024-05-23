@extends('layouts.master')

@section('content')

<a href="{{route('blog-create')}}"><button type="button" class="btn btn-success">add posts</button></a>
@foreach($posts as $post)
  <div class="card m-2">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{Str::limit($post->content, 300)}}</p>
        <p class="card-text mt-3"><strong>Categories:</strong>
        @foreach ($post->categories as $category)
          {{$category->name}}
        @endforeach  
        </p>
        <p><a href="/edit/{{$post->id}}" class="btn btn-success">edit</a><button type="button" class="btn btn-danger">Delete</button></p>
      </div>
  </div>
@endforeach

@endsection
