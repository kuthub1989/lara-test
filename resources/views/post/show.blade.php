@php
    //dd($post->comments)
@endphp

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

    
    <div>
        <h4>Comments:</h4>
        @forelse ($post->comments as $comment)
            <p>{{ $comment->content }}</p>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>
    
@endsection

