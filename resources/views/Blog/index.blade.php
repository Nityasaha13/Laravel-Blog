@extends('layouts.master')

@section('content')


<a href="{{route('create-post-form')}}"><button type="button" class="btn btn-success mx-2">add posts</button></a>
<div class="row">  @foreach($posts as $post)
    <div class="col-md-4">  <div class="card m-2">
        <div class="card-body">
          <p><img src="{{ $post->thumbnail != '' ? '/storage/' . $post->thumbnail : 'https://placehold.co/600x400' }}" style="width:100%; height:200px; object-fit:cover; object-position: center center;"></p>
          <h5 class="card-title"><a href="{{route('single-post',$post->id)}}">{{$post->title}}</a></h5>
          <p class="card-text">{{Str::limit($post->content, 150)}}</p>
          <p class="card-text mt-3"><strong>Categories:</strong>
            @foreach ($post->categories as $category)
              <a href="{{route('category-collection', $category->id)}}">{{$category->name}}</a>
            @endforeach 
          </p>
          <p><a href="/edit/{{$post->id}}" class="btn btn-primary">edit</a>
            <a class="btn btn-danger mx-2" href="{{ route('delete-post', $post->id) }}">Delete</a>
          
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
