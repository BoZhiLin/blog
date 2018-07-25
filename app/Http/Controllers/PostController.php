<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $datas = Post::get();
        
        return view('post.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = auth()->user()->posts()->create($request->only('title', 'content'));        

        if ($data) {
            return redirect()->route('post.index');
        }
    }

    public function show($id)
    {
        $data = Post::find($id);

        if (!$data) {
            return redirect()->route('post.index');    
        }

        return view('post.show', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Post::find($id);

        if (!$data) {
            return redirect()->route('post.index');    
        }

        return view('post.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->only('title', 'content');
        $data = Post::find($id);

        if (!$data) {
            return redirect()->route('post.index');
        }

        $data->update($params);
        return redirect()->route('post.show', $id);
    }

    public function destroy($id)
    {
        $data = Post::find($id);

        if ($data) {
            // Post::destroy($id);
            $data->delete();
            return redirect()->route('post.index');
        }
    }
}
