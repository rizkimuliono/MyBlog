<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.menus.create', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link_type' => 'required',
            'link' => 'nullable',
            'link_id' => 'nullable|integer',
        ]);

        try {
            $menu = new Menu;
            $menu->name = $request->name;
            $menu->link_type = $request->link_type;
            $menu->link = $request->link_type == 'custom' ? $request->link : null;
            $menu->link_id = $request->link_type != 'custom' ? $request->link_id : null;
            $menu->save();

            return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the menu: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'posts', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link_type' => 'required',
            'link' => 'nullable',
            'link_id' => 'nullable|integer',
        ]);

        try {
            $menu = Menu::findOrFail($id);
            $menu->name = $request->name;
            $menu->link_type = $request->link_type;
            $menu->link = $request->link_type == 'custom' ? $request->link : null;
            $menu->link_id = $request->link_type != 'custom' ? $request->link_id : null;
            $menu->save();

            return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the menu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the menu: ' . $e->getMessage()]);
        }
    }
}
