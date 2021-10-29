@extends('layouts.app')

@section('title', 'Add New Post')

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('post.partials.form')
        <div>
            <input type="submit" value="Save Post">
        </div>
    </form>
@endsection