@extends('layouts.master')

@section('content')

  <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->content}}</p>
        <p class="card-text mt-3"><strong>Categories:</strong>
        @foreach ($post->categories as $category)
          {{$category->name}}
        @endforeach  
        </p>
        <p><a href="/edit/{{$post->id}}" class="btn btn-success">edit</a><button type="button" class="btn btn-danger">Delete</button></p>
      </div>
  </div>

@endsection