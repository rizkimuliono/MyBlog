<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        $categories = Category::all();
        $menus = Menu::all();
        return view('blog.index', compact('posts', 'categories', 'menus'));
    }
}
