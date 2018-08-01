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
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
