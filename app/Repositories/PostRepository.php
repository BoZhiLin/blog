<?php

namespace App\Repositories;

use App\Entities\Post;

class PostRepository
{
    public function find($id)
    {
        return Post::find($id);
    }

    public function index()
    {
        return Post::get();
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);

        if (!$post) {
            return false;
        }

        return $post->update($data);
    }

    public function delete($id)
    {
        return Post::destroy($id);
    }
}