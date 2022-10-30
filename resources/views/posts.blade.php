@extends('layout.main')
@section('content')
@foreach($posts as $post)
    <div>{{ $post->title }}</div>
@endforeach
@endsection
