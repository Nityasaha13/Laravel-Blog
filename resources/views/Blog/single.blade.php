@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12">  <div class="card h-100 w-100 m-2">  <div class="card-body">
    <p>
      @if($post->thumbnail != '')
        <img src="/storage/{{ $post->thumbnail }}" style="width:100%; height:400px; object-fit:cover; object-position: center center;"></p>
      @endif
        <h3 class="card-title">{{$post->title}}</h3>
        <p class="card-text mt-1" style="font-size:14px; color:rgb(0, 68, 255)">
          @foreach ($post->categories as $category)
            {{$category->name}},
          @endforeach 
        </p>
        <p class="card-text mt-2">{{$post->content}}</p>
        <p><a href="{{route('posts.index')}}" class="btn btn-warning">back</a>
        </p>
      </div>
    </div>
  </div>
</div>

@endsection
