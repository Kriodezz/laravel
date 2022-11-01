@extends('layout.main')
@section('content')
    <p>{{ $post->id }} . {{ $post->title }}</p>
    <p>{{ $post->description }}</p>
    <p>{{ $post->content }}</p>
    <div>
        <a class="btn btn-warning mb-3" href="{{ route('post.edit', $post->id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger mb-3" value="Delete">

        </form>
    </div>
    <a href="{{ route('post.index') }}">Back</a>
@endsection
