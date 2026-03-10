@extends('layouts.master')

@section('title', 'Add Category')

@section('content')

<div class="container-fluid px-4 py-4">
    
    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3 mb-2">
            <a href="{{ url('admin/category') }}" 
               class="btn btn-light border shadow-sm d-flex align-items-center justify-content-center"
               style="width: 40px; height: 40px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="fw-bold mb-0">Add New Category</h1>
        </div>
        <p class="text-muted small ms-5 ps-2">Create a new blog category with all necessary details</p>
    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        
        <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Information Section -->
            <div class="p-4 border-bottom">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 bg-gradient text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Basic Information</h4>
                </div>

                <div class="row g-4">
                    <!-- Category Name -->
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-medium">
                            Category Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ old('name') }}"
                               class="form-control form-control-lg border-2 @error('name') is-invalid border-danger @enderror"
                               placeholder="Enter category name">
                        @error('name')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6">
                        <label for="slug" class="form-label fw-medium">
                            Slug <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="slug" 
                               id="slug"
                               value="{{ old('slug') }}"
                               class="form-control form-control-lg border-2 @error('slug') is-invalid border-danger @enderror"
                               placeholder="category-slug">
                        @error('slug')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label fw-medium">
                            Description
                        </label>
                        <textarea name="description" 
                                  id="description"
                                  rows="4"
                                  class="form-control border-2 @error('description') is-invalid border-danger @enderror"
                                  placeholder="Enter category description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="col-12">
                        <label for="image" class="form-label fw-medium">
                            Category Image
                        </label>
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
                            <div id="imagePreview" class="mt-3 d-none">
                                <img src="" alt="Preview" class="rounded-3 shadow" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        </div>
                        @error('image')
                            <div class="text-danger small mt-2 d-flex align-items-center gap-1">
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
                    <!-- Meta Title -->
                    <div class="col-12">
                        <label for="meta_title" class="form-label fw-medium">
                            Meta Title
                        </label>
                        <input type="text" 
                               name="meta_title" 
                               id="meta_title"
                               value="{{ old('meta_title') }}"
                               class="form-control form-control-lg border-2 @error('meta_title') is-invalid border-danger @enderror"
                               placeholder="Enter meta title for SEO">
                        @error('meta_title')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="col-12">
                        <label for="meta_description" class="form-label fw-medium">
                            Meta Description
                        </label>
                        <textarea name="meta_description" 
                                  id="meta_description"
                                  rows="3"
                                  class="form-control border-2 @error('meta_description') is-invalid border-danger @enderror"
                                  placeholder="Enter meta description for SEO">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div class="col-12">
                        <label for="meta_keywords" class="form-label fw-medium">
                            Meta Keywords
                        </label>
                        <textarea name="meta_keywords" 
                                  id="meta_keywords"
                                  rows="2"
                                  class="form-control border-2 @error('meta_keywords') is-invalid border-danger @enderror"
                                  placeholder="Enter keywords separated by commas">{{ old('meta_keywords') }}</textarea>
                        @error('meta_keywords')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Status Settings Section -->
            <div class="p-4">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fas fa-toggle-on"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Status Settings</h4>
                </div>

                <div class="row g-4">
                    <!-- Navbar Status -->
                    <div class="col-md-6">
                        <div class="card border-2 h-100 status-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <label for="navbar_status" class="form-label fw-medium mb-1 cursor-pointer">
                                        Show in Navbar
                                    </label>
                                    <p class="small text-muted mb-0">Display this category in navigation menu</p>
                                </div>
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           role="switch"
                                           name="navbar_status" 
                                           id="navbar_status" 
                                           value="1"
                                           {{ old('navbar_status') ? 'checked' : '' }}
                                           style="cursor: pointer;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Status -->
                    <div class="col-md-6">
                        <div class="card border-2 h-100 status-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <label for="status" class="form-label fw-medium mb-1 cursor-pointer">
                                        Active Status
                                    </label>
                                    <p class="small text-muted mb-0">Make this category visible to users</p>
                                </div>
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           role="switch"
                                           name="status" 
                                           id="status" 
                                           value="1"
                                           {{ old('status') ? 'checked' : '' }}
                                           style="cursor: pointer;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-4 py-3 bg-light border-top">
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ url('admin/category') }}" 
                       class="btn btn-lg btn-light border shadow-sm">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="btn btn-lg btn-primary shadow submit-btn">
                        <i class="fas fa-save me-2"></i>
                        Create Category
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

{{-- Custom Styles --}}
<style>
/* Form Controls */
.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
}

.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
}

/* Upload Area */
.upload-area {
    transition: all 0.3s ease;
    border-radius: 0.75rem;
}

.upload-area:hover {
    border-color: #667eea !important;
    background-color: rgba(102, 126, 234, 0.05);
}

/* Status Cards */
.status-card {
    transition: all 0.3s ease;
    border-radius: 0.75rem;
}

.status-card:hover {
    border-color: #667eea !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

/* Toggle Switches */
.form-switch-lg .form-check-input {
    width: 3rem;
    height: 1.5rem;
    cursor: pointer;
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

/* Submit Button */
.submit-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3) !important;
}

/* Image Preview */
#imagePreview img {
    transition: transform 0.3s ease;
}

#imagePreview img:hover {
    transform: scale(1.05);
}

/* Cursor Pointer */
.cursor-pointer {
    cursor: pointer;
}

/* Border Dashed */
.border-dashed {
    border-style: dashed !important;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card {
    animation: fadeInUp 0.5s ease;
}

/* Responsive */
@media (max-width: 768px) {
    .gap-3 {
        gap: 0.75rem !important;
    }
    
    .ms-5 {
        margin-left: 2.5rem !important;
    }
}
</style>

{{-- Custom Scripts --}}
<script>
// Auto-generate slug from name
document.getElementById('name')?.addEventListener('input', function(e) {
    const slug = e.target.value
        .toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/--+/g, '-')
        .trim();
    document.getElementById('slug').value = slug;
});

// Image preview
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

// Form validation feedback
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form?.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('.submit-btn');
        if (submitBtn) {
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating...';
            submitBtn.disabled = true;
        }
    });
});
</script>

@endsection