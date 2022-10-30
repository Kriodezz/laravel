<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): string
    {
        $post = Post::find(1); //пост по id
        $posts = Post::all(); //все посты
        $posts = Post::where('is_published', 1)->get(); //по условию ->first() вернет первый
        dd($post);
    }

    public function create()
    {
        $data = [
            'title' => 'first',
            'content' => 'wtnwtbfvht',
            'image' => 'img',
            'likes' => 12,
            'is_published' => 1
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

    public function firstOrCreate() //записать если нет, если есть - вернуть
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'uped3', //Поля и значения по которым ищем
            ],
            [
                'content' => 'uped',  //Данные для записи если не нашли
                'image' => 'uped',
                'likes' => 21,
                'is_published' => 1,
            ]
        );
    }

    public function updateOrCreate() //добавить если нет, если есть - обновить
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'uped4', //Поля и значения по которым ищем
            ],
            [
                'content' => 'uped4', //Данные для записи если не нашли
                'image' => 'uped4',
                'likes' => 21,
                'is_published' => 1,
            ]
        );
    }
}
