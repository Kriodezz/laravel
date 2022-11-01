<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): string
    {
        //Один ко многим
      //  $category = Category::find(1);   Дать посты категории
      //  $posts = $category->posts;
        //////////////////////////////
      //  $post = Post::find(1);           Дать категорию поста
      //  $category = $post->category;
        //////////////////////////////
        //Многие ко многим
      // $post = Post::find(1);            Дать теги поста
      // $tags = $post->tags;
        //////////////////////////////
      // $tag = Tag::find(1);              Дать посты тега
      // $posts = $tag->posts;

        return view('post.index');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'string',
            'content' => 'string',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'string',
            'content' => 'string',
        ]);
        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
