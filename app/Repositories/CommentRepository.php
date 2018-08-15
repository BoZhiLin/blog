<?php

namespace App\Repositories;

use App\Entities\Comment;

class CommentRepository
{
    public function create(array $data)
    {
        return auth()->user()->comments()->create($data);
    }

    public function delete($id)
    {
        if ($comment = auth()->user()->comments()->find($id)) {
            return $comment->delete();
        }

        return false;
    }
}