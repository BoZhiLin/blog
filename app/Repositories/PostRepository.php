<?php

namespace App\Repositories;

use App\Entities\Post;

class PostRepository
{
    public function index($title = null)
    {
        if ($title) {
            return Post::where('title', 'like', '%'.$title.'%')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        
        return Post::orderBy('created_at', 'desc')
            ->get();
    }

    public function find($id)
    {
        return Post::find($id)->load('comments.user');
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);

        return $post ? $post->update($data) : false;
    }

    public function delete($id)
    {
        return Post::destroy($id);
    }
}