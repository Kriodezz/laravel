<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): string
    {
        $post = Post::find(1); //пост по id
        $postы = Post::all(); //все посты
        $postы = Post::where('is_published', 1)->get(); //по условию ->first() вернет первый
        dd($post);
    }

    public function create()
    {
        $data = [
            'title' => '',
            'content' => '',
            'image' => '',
            'likes' => '',
            'is_published' => ''
        ]; //массив с данными для таблицы
        Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $data['image'],
            'likes' => $data['likes'],
            'is_published' => $data['is_published'],
        ]);
    }

    public function update()
    {
        $post = Post::find(1);
        $post->update([
            'title' => 'upd',
            'content' => 'upd',
            'image' => 'upd',
            'likes' => 'upd',
            'is_published' => 'upd',
        ]);
    }

    public function delete()
    {
        $post = Post::find(1);
        $post->delete();
        /*
         * восстановить
         * $post = Post::withTrashed()->find(1);
         * $post->restore
         */
    }
}
