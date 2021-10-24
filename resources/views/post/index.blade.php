@extends('layouts.app')

@section('title', "List of Post")

@section('content')

    @forelse ($posts as $post)
        @include('post.partials.post')
    @empty
        <div>No post found.</div>
    @endforelse 
        
@endsection

