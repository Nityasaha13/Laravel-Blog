@extends('layouts.master')

@section('content')

<form method="POST" action="">
    @csrf

    <h1 class="align-items-center">Edit category</h1>
    <div class="form-group">
        <label for="title">Category name</label>
        <input type="text" class="form-control" name="categories" id="category" placeholder="Enter">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection