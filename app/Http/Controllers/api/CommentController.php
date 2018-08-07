<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Store;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function store(Store $request, $id)
    {
        $comment = request()->only('content');
        $comment['post_id'] = $id;
        $data = $this->commentRepo->create($comment);

        if (!$data) {
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }
}
