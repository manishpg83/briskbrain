@extends('layouts.master')

@section('title', 'Edit Page Metadata')

@section('content')

<div class="container-fluid px-4 py-4">
    
    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3 mb-2">
            <a href="{{ url()->previous() }}" 
               class="btn btn-light border shadow-sm d-flex align-items-center justify-content-center"
               style="width: 40px; height: 40px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="fw-bold mb-0">Edit Page Metadata</h1>
        </div>
        <p class="text-muted small ms-5 ps-2">Update SEO and Open Graph metadata for your page</p>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3 mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        
        <form method="POST" action="{{ route('admin.page-metadata.update', $pageMetadata->id) }}">
            @csrf
            @method('PUT')

            <!-- Page Information Section -->
            <div class="p-4 border-bottom">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 bg-gradient text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Page Information</h4>
                </div>

                <div class="row g-4">
                    <!-- Page Name (Readonly) -->
                    <div class="col-12">
                        <label for="page_name" class="form-label fw-medium">
                            Page Name
                        </label>
                        <input type="text" 
                               id="page_name" 
                               name="page_name" 
                               class="form-control form-control-lg border-2 bg-light" 
                               value="{{ $pageNames[$pageMetadata->page_name] ?? 'Default Page Name' }}" 
                               readonly>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Page name cannot be changed
                        </small>
                    </div>

                    <!-- Page Title -->
                    <div class="col-12">
                        <label for="title" class="form-label fw-medium">
                            Page Title
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->title }}"
                               placeholder="Enter page title">
                    </div>
                </div>
            </div>

            <!-- Meta Fields Section -->
            <div class="p-4 border-bottom bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">SEO Meta Fields</h4>
                </div>

                <div class="row g-4">
                    <!-- Meta Title -->
                    <div class="col-12">
                        <label for="meta_title" class="form-label fw-medium">
                            Meta Title
                        </label>
                        <input type="text" 
                               id="meta_title" 
                               name="meta_title" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->meta_title }}"
                               placeholder="Enter meta title for SEO">
                    </div>

                    <!-- Meta Description -->
                    <div class="col-12">
                        <label for="meta_description" class="form-label fw-medium">
                            Meta Description
                        </label>
                        <textarea id="meta_description" 
                                  name="meta_description" 
                                  class="form-control border-2" 
                                  rows="3"
                                  placeholder="Enter meta description for SEO">{{ $pageMetadata->meta_description }}</textarea>
                    </div>

                    <!-- Meta Keywords -->
                    <div class="col-12">
                        <label for="meta_keywords" class="form-label fw-medium">
                            Meta Keywords
                        </label>
                        <textarea id="meta_keywords" 
                                  name="meta_keywords" 
                                  class="form-control border-2" 
                                  rows="2"
                                  placeholder="Enter keywords separated by commas">{{ $pageMetadata->meta_keywords }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Open Graph Section -->
            <div class="p-4 border-bottom">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Open Graph (OG) Fields</h4>
                </div>

                <div class="row g-4">
                    <!-- OG Locale -->
                    <div class="col-md-6">
                        <label for="og_locale" class="form-label fw-medium">
                            OG Locale
                        </label>
                        <input type="text" 
                               id="og_locale" 
                               name="og_locale" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->og_locale }}"
                               placeholder="e.g., en_US">
                    </div>

                    <!-- OG Type -->
                    <div class="col-md-6">
                        <label for="og_type" class="form-label fw-medium">
                            OG Type
                        </label>
                        <input type="text" 
                               id="og_type" 
                               name="og_type" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->og_type }}"
                               placeholder="e.g., website">
                    </div>

                    <!-- OG Title -->
                    <div class="col-md-6">
                        <label for="og_title" class="form-label fw-medium">
                            OG Title
                        </label>
                        <input type="text" 
                               id="og_title" 
                               name="og_title" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->og_title }}"
                               placeholder="Enter Open Graph title">
                    </div>

                    <!-- OG URL -->
                    <div class="col-md-6">
                        <label for="og_url" class="form-label fw-medium">
                            OG URL
                        </label>
                        <input type="text" 
                               id="og_url" 
                               name="og_url" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->og_url }}"
                               placeholder="Enter canonical URL">
                    </div>

                    <!-- OG Site Name -->
                    <div class="col-md-6">
                        <label for="og_site_name" class="form-label fw-medium">
                            OG Site Name
                        </label>
                        <input type="text" 
                               id="og_site_name" 
                               name="og_site_name" 
                               class="form-control form-control-lg border-2"
                               value="{{ $pageMetadata->og_site_name }}"
                               placeholder="Enter site name">
                    </div>

                    <!-- OG Keywords -->
                    <div class="col-md-6">
                        <label for="og_keywords" class="form-label fw-medium">
                            OG Keywords
                        </label>
                        <textarea id="og_keywords" 
                                  name="og_keywords" 
                                  class="form-control border-2" 
                                  rows="3"
                                  placeholder="Enter Open Graph keywords">{{ $pageMetadata->og_keywords }}</textarea>
                    </div>

                    <!-- OG Description -->
                    <div class="col-12">
                        <label for="og_description" class="form-label fw-medium">
                            OG Description
                        </label>
                        <textarea id="og_description" 
                                  name="og_description" 
                                  class="form-control border-2" 
                                  rows="3"
                                  placeholder="Enter Open Graph description">{{ $pageMetadata->og_description }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-4 py-3 bg-light border-top">
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ url()->previous() }}" 
                       class="btn btn-lg btn-light border shadow-sm">
                        <i class="fas fa-times me-2"></i>
                        Cancel
                    </a>
                    <button type="submit" 
                            class="btn btn-lg btn-primary shadow submit-btn">
                        <i class="fas fa-save me-2"></i>
                        Update Metadata
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

/* Readonly Input */
.form-control[readonly] {
    background-color: #f8f9fa;
    cursor: not-allowed;
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

/* Alert Styling */
.alert {
    border: none;
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
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handling
    const form = document.querySelector('form');
    
    form?.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('.submit-btn');
        if (submitBtn) {
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';
            submitBtn.disabled = true;
        }
    });
});
</script>

@endsection