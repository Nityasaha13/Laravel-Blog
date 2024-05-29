@extends('layouts.master')

@section('content')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<form method="POST" action="{{route('update-category', $category->id)}}">
    @csrf
    @method('PUT')
    <h1 class="align-items-center">Edit category</h1>
    <div class="form-group">
        <label for="title">Category name</label>
        <input type="text" class="form-control" name="categories" id="category" placeholder="Enter" value="{{$category['name']}}">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>

@endsection
