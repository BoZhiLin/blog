<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function store($id)
    {
        $this->validateParameters(request());
        $comment = request()->only('content');
        $comment['post_id'] = $id;
        $data = $this->commentRepo->create($comment);

        if ($data) {
            return redirect()->route('post.show', $id);
        }
    }

    public function validateParameters(Request $request)
    {
        $rules = [
            'content' => 'required|string',
        ];

        $messages = [
            'content.required' => '請輸入留言內容',
        ];

        $request->validate($rules, $messages);
    }
}
