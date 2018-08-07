<?php

namespace App\Repositories;

use App\Entities\Comment;

class CommentRepository
{
    public function find($id)
    {
        return Comment::find($id);
    }

    public function create(array $data)
    {
        return auth()->user()->comments()->create($data);
    }
}