<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        $menus = Menu::all();
        return view('admin.dashboard', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('admin.dashboard')->with('success','Create Successfully !');;
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('admin.dashboard')->with('success','Update Successfully !');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.dashboard');
    }

    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);
        $menus = Menu::all();
        $categories = Category::all();
        return view('admin.posts.show', compact('post', 'menus','categories'));
    }
}
