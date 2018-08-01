<?php

namespace App\Http\Controllers\web;

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
        return view('post.index', ['datas' => $this->postRepo->index()]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = $this->postRepo->create(request()->only('title', 'content'));       

        if ($data) {
            return redirect()->route('post.index');
        }
    }

    public function show($id)
    {
        $data = $this->postRepo->find($id);

        if (!$data) {
            return redirect()->route('post.index');    
        }

        return view('post.show', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = $this->postRepo->find($id);

        if (!$data) {
            return redirect()->route('post.index');    
        }

        return view('post.edit', ['data' => $data]);
    }

    public function update($id)
    {
        $result = $this->postRepo->update($id, request()->only('title', 'content'));

        if (!$result) {
            return redirect()->route('post.index');
        }

        return redirect()->route('post.show', $id);
    }

    public function destroy($id)
    {
        $result = $this->postRepo->delete($id);

        if ($result) {
            return redirect()->route('post.index');
        }
    }
}
