@extends('layouts.app')

@section('title', 'Show')

@section('header')
    <h1 class="text-success">{{ $username }}'s Posts</h1>
@endsection

@section('content')
    <ul style="background-color:#ccc">
      @forelse ($post_titles as $post)
        <li>{{ $post }}</li>
      @empty
        <p>No Posts Yet.</p>
      @endforelse
    </ul>
@endsection

@section('footer')
    <p class="text-secondary">

    @forelse ($sns_links as $sns)
        <!-- Only Icon, No link -->
        @if ($sns === "facebook")
            <span class="mx-2"><i class="fa-brands fa-{{ $sns }}-f fa-2x"></i></span>
        @else
            <span class="mx-2"><i class="fa-brands fa-{{ $sns }} fa-2x"></i></span>
        @endif
    @empty
        <span class="fs-5 fw-lighter text-info">No SNS.</span>
    @endif
    </p>
@endsection