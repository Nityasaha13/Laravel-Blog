@extends('layouts.master')

@section('content')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<form method="POST" action="{{route('update.post', $post->id)}}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{$post['id']}}" name="post_id">
    <h1 class="align-items-center">Edit Post</h1>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{$post['title']}}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="10" placeholder="Enter Content">{{$post['content']}}</textarea>
    </div>
    <div class="form-group mt-2">
        <select id = "categories-box" class="categories-box" name="categories[]" multiple="multiple">
            <option value="">--Select--</option>
            @foreach ( $categories as $category )
                @php
                $selected = $post['categories']->pluck('id')->contains($category->id) ? 'selected' : '';
                @endphp
                <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
    <a href="{{route('posts.index')}}" class="btn btn-warning mt-2 mx-2">back</a>
</form>

@endsection

@section('footer')

<script>
$(document).ready(function() {
    $('.categories-box').select2();


});
</script>
@endsection

