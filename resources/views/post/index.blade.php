@extends('layout.main')
@section('content')
    <a href="{{ route('post.create') }}">
        <button type="button" class="btn btn-primary mb-3">Create new</button>
    </a>
    @foreach($posts as $post)
        <div class="row">
            <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
        </div>
    @endforeach
@endsection
