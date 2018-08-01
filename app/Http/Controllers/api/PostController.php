<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        return response()->json(['status' => 0, 'datas' => $this->postRepo->index()]);
    }

    public function store()
    {
        $data = $this->postRepo->create(request()->only('title', 'content'));

        if (!$data) {
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0, 'post' => $data]);
    }

    public function show($id)
    {
        if (! $data = $this->postRepo->find($id)) {
            return response()->json(['status' => 1, 'message' => 'Post not found'], 404);
        }

        return response()->json(['status' => 0, 'post' => $data]);
    }

    public function update($id)
    {
        $result = $this->postRepo->update($id, request()->only('title', 'content'));

        if (!$result) {
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }

    public function destroy($id)
    {
        if (! $result = $this->postRepo->delete($id)) {
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }
}
