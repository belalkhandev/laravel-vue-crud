<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function home()
    {
        return view('vueApp');
    }

    public function index()
    {
        return Post::orderBy('id', 'desc')->get();
    }


    public function create()
    {

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        //$create = Post::create($request->all());

        return response()->json(['status' => 'success', 'msg' => 'post created successfully']);

    }

    public function show($id)
    {
        return Post::where('id', $id)->first();
    }

    public function edit($id)
    {
        return Post::where('id', $id)->first();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        //$update = Post::update($request->all());

        return response()->json(['status' => 'updated', 'msg' => 'post Update successfully']);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            return response()->json(['status' => 'updated', 'msg' => 'post Deleted successfully']); 
        }
    }


}
