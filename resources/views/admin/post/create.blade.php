@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create post</h1>
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
                        <form id="create-post-form" class="col-12" action="{{ route('admin.post.store') }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-4">
                                <label for="post-title">Category name</label>
                                <input type="text" class="form-control" name="title" id="post-title"
                                       placeholder="Post title" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <textarea id="summernote" name="content">
                                    {{ old('content') }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">
                                    Error message: {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
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
                                            {{ $category->id == old('category_id') ? ' selected' : '' }}>
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
                                            {{ is_array(old('tag_ids')) && in_array((string)$tag->id, old('tag_ids'), true) ? ' selected': ''}}>
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn btn-primary" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
