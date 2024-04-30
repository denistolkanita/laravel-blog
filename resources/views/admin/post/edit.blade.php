@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form id="edit-post-form" class="col-12" action="{{ route('admin.post.update', $post->id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-4">
                                <label for="post-title">Category name</label>
                                <input type="text" class="form-control" name="title" id="post-title"
                                       placeholder="Post title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <textarea id="summernote" name="content">
                                    {{ old('content', $post->content) }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <div class="preview-image mt-3">
                                    <img src="{{ Storage::url($post->preview_image) }}" alt="preview-image" class="w-50">
                                </div>
                                <label for="preview_image">Preview image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="preview_image"
                                               name="preview_image">
                                        <label class="custom-file-label" for="preview_image">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <div class="main-image mt-3">
                                    <img src="{{ Storage::url($post->main_image) }}" alt="main-image" class="w-50">
                                </div>
                                <label for="main_image">Main image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                        <label class="custom-file-label" for="main_image">Main image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Select category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Select tags</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select tags"
                                        style="width: 100%;" name="tag_ids[]">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray(), true)
                                                ? ' selected'
                                                : ''
                                            }}>
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn btn-primary" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
