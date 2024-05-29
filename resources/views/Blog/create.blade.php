@extends('layouts.master')

@section('content')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<form method="POST" action="{{url('/')}}/create-post"> 
    @csrf
    <h1 class="align-items-center">Create Posts</h1>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="5" placeholder="Enter Content"></textarea>
    </div>
    <div class="form-group mt-2">
        <label for="category">Categories</label>
          <select id = "categories-box" class="categories-box" name="categories[]" multiple="multiple" style="width: 300px;">
            @foreach($categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@section('footer')

<script>
$(document).ready(function() {
    $('.categories-box').select2();


});
</script>
@endsection
