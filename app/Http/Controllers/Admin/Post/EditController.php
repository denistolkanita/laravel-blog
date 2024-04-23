<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Edit post controller
 */
class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }
}
