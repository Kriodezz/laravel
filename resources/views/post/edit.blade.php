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
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category">
                @foreach($categories as $category)
                    <option {{ $category->id == $post->category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" name="tags[]" id="tags" multiple >
                @foreach($tags as $tag)
                    <option
                       @foreach($post->tags as $postTag)
                        {{ $tag->id == $postTag->id ? 'selected' : '' }}
                       @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection
