<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Category store controller
 */
class ShowController extends Controller
{
    /**
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
