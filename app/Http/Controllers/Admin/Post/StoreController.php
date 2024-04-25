<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

/**
 * Category store controller
 */
class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'] ?? [];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::putFile('/images', $data['preview_image']);
        $data['main_image'] = Storage::putFile('/images', $data['main_image']);
        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);

        return redirect()->route('admin.post.index');
    }
}
