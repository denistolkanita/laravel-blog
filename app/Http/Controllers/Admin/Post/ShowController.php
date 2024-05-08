<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Category store controller
 */
class ShowController extends BaseController
{
    /**
     * @param Post $post
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
