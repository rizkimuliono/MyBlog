<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        $menus = Menu::all();
        $categories = Category::all();
        return view('admin.category.show', compact('category', 'menus', 'categories'));
    }
}
