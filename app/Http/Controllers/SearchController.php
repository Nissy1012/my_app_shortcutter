<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('place', 'LIKE', "%{$keyword}%")
                ->orWhere('station', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();

        return view('index', compact('posts','keyword'));
    }
}