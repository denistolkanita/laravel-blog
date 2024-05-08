<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Post service
 */
class PostService
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        try {
            Db::beginTransaction();
            $tagIds = $data['tag_ids'] ?? [];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if (!empty($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            Db::commit();
        } catch (Exception $exception) {
            Db::rollBack();
            abort(500, $exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @param Post $post
     * @return Post
     */
    public function update(array $data, Post $post): Post
    {
        try {
            Db::beginTransaction();
            $tagIds = $data['tag_ids'] ?? [];
            unset($data['tag_ids']);
            if (!empty($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (!empty($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            $post->tags()->sync($tagIds);
            Db::commit();
        } catch (Exception $exception) {
            Db::rollBack();
            abort(500, $exception->getMessage());
        }

        return $post;
    }
}
