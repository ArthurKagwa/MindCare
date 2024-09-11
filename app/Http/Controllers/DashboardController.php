<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = new Post();
        $posts= $post->allPosts();
        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */

}
