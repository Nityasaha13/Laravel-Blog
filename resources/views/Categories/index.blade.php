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
          <td>{{ $name }}</td>
          <td><button type="button" class="btn btn-success">edit</button><button type="button" class="btn btn-danger">delete</button></td>
        </tr>
      
      @endforeach
   </tbody>

</table>
  
@endsection
