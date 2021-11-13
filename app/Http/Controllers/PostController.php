<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function allPosts()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(['title', 'body']), [
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = Auth::id();
        $post->save();

        return redirect(route('dashboard'))
            ->with(['success' => 'Post is added successfully!']);
    }

}
