@extends('layouts.master')

@section('content')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<form method="POST" action="{{route('category.store')}}" class="my-4">
    @csrf

    <h1 class="align-items-center" >Add category</h1>
    <div class="form-group">
        <label for="title" class="fs-5 fw-bold mt-2">Category name</label>
        <input type="text" class="form-control" name="categories" id="category" placeholder="Enter">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
    <a href="{{route('categories.show')}}" class="btn btn-warning mx-2 mt-2">back</a>
</form>

@endsection
