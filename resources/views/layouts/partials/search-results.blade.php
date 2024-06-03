
@foreach($posts as $post)

  @include('layouts.partials.post-cards', ['post' => $post])
  
@endforeach
