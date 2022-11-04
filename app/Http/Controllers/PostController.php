<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'string',
            'content' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id
//            ]);
//        }
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
