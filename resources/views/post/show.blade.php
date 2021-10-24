@extends('layouts.app')

@section('title', $post['title'])

@section('content')

    @if($post['is_new'])
        <small>New Post</small> 
    @elseif(!$post['is_new'])
        <small>Old Post</small>
    @endif

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection

