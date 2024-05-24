@extends('layouts.master')

@section('content')

<form method="POST" action="{{url('/')}}/create-post"> 
    @csrf
    <h1 class="align-items-center">Edit Post</h1>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{$posts->$title}}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="5" placeholder="Enter Content"> {{$posts->$content}} </textarea>
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
