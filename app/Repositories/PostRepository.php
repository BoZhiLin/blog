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
        return Post::with('comments.user')
            ->find($id);
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->create($data);
    }

    public function update($id, array $data)
    {
        if ($post = auth()->user()->posts()->find($id)) {
            return $post->update($data);
        }
    }

    public function delete($id)
    {
        if ($post = auth()->user()->posts()->find($id)) {
            return $post->delete();
        }
    }
}