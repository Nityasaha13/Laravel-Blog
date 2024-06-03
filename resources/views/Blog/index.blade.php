@extends('layouts.master')

@section('content')

<div class="container d-flex justify-content-end align-items-center my-2">
  <div class="input-group custom-width">
    <input type="search" name="search" id="search" class="form-control rounded border-dark" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
      <i class="fas fa-search"></i>
    </span>
  </div>
  <div class="add-post ms-2">
    <a href="{{ route('create-post-form') }}" class="btn btn-success">Add Post</a>
  </div>
</div>

<div id="loading" style="display: none; text-align:center">
  <img src="/storage/thumbnails/bGzf6gxXW2GBdJlKPQOxDjlRMFwNODiXvDKiCmCY.svg" alt="Loading..." style="width:200px;">
</div>

<div class="row" id="content">
  @foreach($posts as $post)
    @include('layouts.partials.post-cards', ['post' => $post])
  @endforeach
</div>

@endsection

@section('footer')
<script>
$(document).ready(function() {
    var typingTimer;                // Timer identifier
    var doneTypingInterval = 1000;  // Time in ms (2 seconds)

    $('#search').on('keyup', function() {
      var value = $(this).val();

      $('#content').hide();

      $('#loading').show();

      clearTimeout(typingTimer);

      typingTimer = setTimeout(function() {
        
        $.ajax({
          type: 'GET',
          url: '{{ route('search') }}',
          data: { search: value },
          success: function(data) {
            console.log('Search results');
            $('#content').html(data);
            
            $('#content').show();
            $('#loading').hide();

            if ($.trim(data) == '') {
                $('#content').html('<p>No posts found.</p>').show();
            }
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            $('#loading').hide();
          }
        });
      }, doneTypingInterval);
    });
  });
</script>
@endsection
