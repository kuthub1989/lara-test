@extends('layouts.app')

@section('title', 'Add New Post')

@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Save Post">
        </div>
    </form>
@endsection