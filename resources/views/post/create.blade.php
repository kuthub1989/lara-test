@extends('layouts.app')

@section('title', 'Add New Post')

@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        @include('post.partials.form')
        <div>
            <input type="submit" value="Save Post" class="btn btn-primary">
        </div>
    </form>
@endsection