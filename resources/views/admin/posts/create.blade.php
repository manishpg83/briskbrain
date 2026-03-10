@extends('layouts.master')

@section('title', isset($post) ? 'Edit Post' : 'Add Post')

@section('content')

<div class="container-fluid px-4 py-4">

    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3 mb-2">
            <a href="{{ url('admin/posts') }}"
                class="btn btn-light border shadow-sm d-flex align-items-center justify-content-center"
                style="width: 40px; height: 40px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="fw-bold mb-0">{{ isset($post) ? 'Edit Post' : 'Add New Post' }}</h1>
        </div>
        <p class="text-muted small ms-5 ps-2">Manage blog posts with all necessary details</p>
    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-body">
            <form action="{{ isset($post) ? route('update-post', $post) : url('admin/add-post') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                @method('PUT')
                @endif

                <!-- Basic Information Section -->
                <div class="p-4 border-bottom">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-3 bg-gradient text-white d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Basic Information</h4>
                    </div>

                    <div class="row g-4">
                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="category" class="form-label fw-medium">Category</label>
                            <select name="category_id" class="form-control form-control-lg border-2" id="category">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($post) && $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-medium">Name</label>
                            <input type="text" name="name" class="form-control form-control-lg border-2 @error('name') is-invalid border-danger @enderror"
                                id="name" value="{{ isset($post) ? $post->name : old('name') }}">
                            @error('name')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="col-md-6">
                            <label for="slug" class="form-label fw-medium">Slug</label>
                            <input type="text" name="slug" class="form-control form-control-lg border-2 @error('slug') is-invalid border-danger @enderror"
                                id="slug" value="{{ isset($post) ? $post->slug : old('slug') }}">
                            @error('slug')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- YouTube Iframe -->
                        <div class="col-md-6">
                            <label for="yt_iframe" class="form-label fw-medium">YouTube Iframe</label>
                            <input type="text" name="yt_iframe" class="form-control form-control-lg border-2 @error('yt_iframe') is-invalid border-danger @enderror"
                                id="yt_iframe" value="{{ isset($post) ? $post->yt_iframe : old('yt_iframe') }}">
                            @error('yt_iframe')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="col-12">
                            <label for="image" class="form-label fw-medium">Post Image</label>
                            <div class="position-relative">
                                <input type="file"
                                    name="image"
                                    id="image"
                                    accept="image/*"
                                    class="d-none"
                                    onchange="previewImage(event)">
                                <label for="image"
                                    class="form-control border-2 border-dashed text-center py-5 cursor-pointer upload-area @error('image') border-danger bg-danger bg-opacity-10 @enderror"
                                    style="cursor: pointer; min-height: 180px; display: flex; align-items: center; justify-content: center;">
                                    <div>
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                        <p class="mb-2">
                                            <span class="fw-semibold text-primary">Click to upload</span>
                                            <span class="text-muted">or drag and drop</span>
                                        </p>
                                        <p class="small text-muted mb-0">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </label>
                                <!-- Image Preview -->
                                <div id="imagePreview" class="mt-3 {{ isset($post) && $post->image ? '' : 'd-none' }}">
                                    <img src="{{ isset($post) ? asset($post->image) : '' }}"
                                        alt="Preview"
                                        class="rounded-3 shadow"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                            @error('image')
                            <div class="text-danger small mt-2 d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-medium">Description</label>
                            <textarea name="description" class="form-control border-2 @error('description') is-invalid border-danger @enderror"
                                id="description">{{ isset($post) ? $post->description : old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="p-4 border-bottom bg-light bg-opacity-50">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">SEO Settings</h4>
                    </div>

                    <div class="row g-4">
                        <div class="col-12">
                            <label for="meta_title" class="form-label fw-medium">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control form-control-lg border-2 @error('meta_title') is-invalid border-danger @enderror"
                                id="meta_title" value="{{ isset($post) ? $post->meta_title : old('meta_title') }}">
                            @error('meta_title')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="meta_description" class="form-label fw-medium">Meta Description</label>
                            <textarea name="meta_description" class="form-control border-2 @error('meta_description') is-invalid border-danger @enderror"
                                id="meta_description">{{ isset($post) ? $post->meta_description : old('meta_description') }}</textarea>
                            @error('meta_description')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="meta_keywords" class="form-label fw-medium">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control border-2 @error('meta_keywords') is-invalid border-danger @enderror"
                                id="meta_keywords">{{ isset($post) ? $post->meta_keywords : old('meta_keywords') }}</textarea>
                            @error('meta_keywords')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Status Section -->
                <div class="p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Status</h4>
                    </div>
                    <div class="form-check form-switch form-switch-lg">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1"
                            {{ isset($post) && $post->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>

                    <div class="mt-3">
                        <label for="created_by" class="form-label fw-medium">Created By</label>
                        <input type="text" name="created_by" class="form-control form-control-lg border-2" id="created_by"
                            value="{{ isset($post) ? $post->created_by : old('created_by') }}">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-4 py-3 bg-light border-top d-flex justify-content-end gap-3">
                    <a href="{{ url('admin/posts') }}" class="btn btn-lg btn-light border shadow-sm">Cancel</a>
                    <button type="submit" class="btn btn-lg submit-btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white;">
                        <i class="fas fa-save me-2"></i> {{ isset($post) ? 'Update Post' : 'Add Post' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = preview?.querySelector('img');

        if (file && preview && previewImg) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<style>
    .tox-notifications-container {
        display: none !important;
    }
</style>

@endsection