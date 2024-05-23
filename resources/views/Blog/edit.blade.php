@extends('layouts.master')

@section('content')

<form method="POST" action="">
    @csrf
    <h1 class="align-items-center">Edit Post</h1>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="5" placeholder="Enter Content"></textarea>
    </div>
    <div class="form-group">
        <label for="category">Categories</label>
        <input type="text" class="form-control" name="categories" id="category" placeholder="Enter categories">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
