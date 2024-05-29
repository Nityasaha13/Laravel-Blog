@extends('layouts.master')

@section('content')


<a href="{{route('create-post-form')}}"><button type="button" class="btn btn-success">add posts</button></a>
<div class="row">  @foreach($posts as $post)
    <div class="col-md-4">  <div class="card m-2">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{Str::limit($post->content, 300)}}</p>
          <p class="card-text mt-3"><strong>Categories:</strong>
            @foreach ($post->categories as $category)
              {{$category->name}}
            @endforeach 
          </p>
          <p><a href="/edit/{{$post->id}}" class="btn btn-success">edit</a>
            <a class="btn btn-danger mx-2" href="{{ route('delete-post', $post->id) }}">Delete</a>
          
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
