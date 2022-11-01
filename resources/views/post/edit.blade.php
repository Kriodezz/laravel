@extends('layout.main')
@section('content')
    <form method="post" action="{{ route('post.update', $post->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="title"
                   value="{{ $post->title }}"
                   placeholder="enter title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text"
                   name="description"
                   class="form-control"
                   id="description"
                   value="{{ $post->description }}"
                   placeholder="Description">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text"
                   name="image"
                   class="form-control"
                   id="image"
                   value="{{ $post->image }}"
                   placeholder="insert image">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control"
                      name="content"
                      id="content"
                      rows="3"
                      placeholder="Content post">{{ $post->content }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection
