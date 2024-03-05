<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $user = User::with('categories')->find($userId);
        $categories = $user->categories;

        return view('home', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category([
            'name' => $request->input('category_name'),
        ]);

        $request->user()->categories()->save($category);
        return back()->with('success', 'Categoria criada com sucesso!');
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->id !== $category->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $category->delete();

        return back()->with('success', 'Categoria excluída com sucesso!');
    }
}
