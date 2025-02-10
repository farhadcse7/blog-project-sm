<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.post_index');
    }
    public function store(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message', 'Post added successfully');
    }

    public function show()
    {
        $posts = Post::all();
        return view('admin.post_show', compact('posts'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post deleted successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message', 'Post updated successfully');
    }
}
