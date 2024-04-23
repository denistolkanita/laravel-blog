<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Index post controller
 */
class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }
}
