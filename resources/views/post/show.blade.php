@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h1>
        {{ $post->title }}
        @if (now()->diffInMinutes($post->created_at) < 60)
            <span class="badge badge-pill badge-primary">New</span>
        @endif
    </h1>
    <div class="alert alert-light" role="alert">
     Added {{ $post->created_at->diffForHumans() }}
    </div>
    <p>{{ $post->content }}</p>
    
@endsection

