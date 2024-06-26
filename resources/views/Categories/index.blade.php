@extends('layouts.master')

@section('content')

<a href="{{route('add-category')}}"><button type="button" class="btn btn-success">add categories</button></a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Sl no.</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach($categories as $id => $name)
        <tr>
          <th scope="row">{{$id}}</th>
          <td><a href="{{route('category-collection', $id)}}">{{ $name }}</a></td>
          <td><a href="/edit-category/{{$id}}" class="btn btn-primary">edit</a><a href="{{route('delete-category', $id)}}" class="btn btn-danger mx-2">delete</a></td>
        </tr>
      
      @endforeach
   </tbody>

</table>
  
@endsection
