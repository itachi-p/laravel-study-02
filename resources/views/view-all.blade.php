@extends('layouts.app')

@section('title', 'All Posts')

@section('header')
    <h1 class="text-danger">All Posts</h1>
@endsection

@section('content')
    @if ($post_titles)
        <ul style="background-color:#ccc">
          @foreach ($post_titles as $post)
              <li>{{ $post }}</li>
          @endforeach
        </ul>
    @endif

    <ul>
      @forelse ($post_titles as $post)
      <li>{{ $post }}</li>
      @empty
      <p>No Posts Yet.</p>
      @endforelse
    </ul>
@endsection

@section('footer')
    <p>This is the footer.</p>
@endsection