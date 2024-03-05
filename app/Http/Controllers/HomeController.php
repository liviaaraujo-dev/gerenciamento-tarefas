<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $user = User::with(['tasks', 'categories'])->find($userId);
        $tasks = $user->tasks;
        $categories = $user->categories;

        return view('home', compact('tasks', 'categories'));
    }
}