@extends('layouts.master')

@section('content')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<form method="POST" action="{{route('update.post', $post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <input type="hidden" value="{{$post['id']}}" name="post_id">
    <h1 class="align-items-center">Edit Post</h1>
    <div class="form-group">
        <label for="title" class="fs-5 fw-bold mt-2">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{$post['title']}}">
    </div>

    <div class="form-group">
        <label for="content" class="fs-5 fw-bold mt-2">Content</label>
        <textarea class="form-control" name="content" id="content" rows="10" placeholder="Enter Content">{{$post['content']}}</textarea>
    </div>

    <div class="form-group mt-2">
        <label for="thumbnail" class="fs-5 fw-bold mt-2">Thumbnail</label>
        @if (isset($post['thumbnail']) && !empty($post['thumbnail']))
          <p><img id="thumbnail-preview" src="{{ asset('storage/' . $post['thumbnail']) }}" alt="Post Thumbnail Preview" style="width:300px; height:200px; object-fit:cover;"></p>
        @endif
        <input type="file" id="thumbnail" name="thumbnail" value="">
        <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
    </div>

    <div class="form-group mt-2">
        <label for="category" class="fs-5 fw-bold mt-2">Category</label>
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

