@extends('layouts.master')

@section('title', isset($review) ? 'Edit Review' : 'Add Review')

@section('content')
<div class="container-fluid px-4 py-4">

    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3 mb-2">
            <a href="{{ route('reviews.index') }}"
               class="btn btn-light border shadow-sm d-flex align-items-center justify-content-center"
               style="width: 40px; height: 40px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="fw-bold mb-0">
                {{ isset($review) ? 'Edit Review' : 'Add New Review' }}
            </h1>
        </div>
        <p class="text-muted small ms-5 ps-2">
            Manage client reviews with all necessary details
        </p>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <form action="{{ isset($review) ? route('reviews.update', $review) : route('reviews.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @isset($review)
                @method('PUT')
            @endisset

            <!-- ================= BASIC INFO ================= -->
            <div class="p-4 border-bottom">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width:40px;height:40px;background:linear-gradient(135deg,#667eea,#764ba2);">
                        <i class="fas fa-user"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Basic Information</h4>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-medium">
                            Client Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               name="client_name"
                               value="{{ old('client_name', $review->client_name ?? '') }}"
                               class="form-control form-control-lg @error('client_name') is-invalid @enderror"
                               placeholder="Enter client name">
                        @error('client_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-medium">Designation</label>
                        <input type="text"
                               name="designation"
                               value="{{ old('designation', $review->designation ?? '') }}"
                               class="form-control form-control-lg"
                               placeholder="CEO, Founder, Manager">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-medium">Review Text</label>
                        <textarea name="review_text"
                                  rows="4"
                                  class="form-control @error('review_text') is-invalid @enderror"
                                  placeholder="Enter review">{{ old('review_text', $review->review_text ?? '') }}</textarea>
                        @error('review_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Image -->
                    <div class="col-12">
                        <label class="form-label fw-medium">Client Image</label>

                        <input type="file" name="image" id="image" class="d-none" onchange="previewImage(event)">
                        <label for="image"
                               class="form-control border-dashed text-center py-5 upload-area cursor-pointer">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                            <p class="mb-1">
                                <span class="fw-semibold text-primary">Click to upload</span> or drag & drop
                            </p>
                            <small class="text-muted">PNG, JPG, GIF up to 10MB</small>
                        </label>

                        <div id="imagePreview"
                             class="mt-3 {{ isset($review) && $review->image ? '' : 'd-none' }}">
                            <img src="{{ isset($review) ? asset($review->image) : '' }}"
                                 class="rounded shadow"
                                 style="width:150px;height:150px;object-fit:cover;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= STATUS ================= -->
            <div class="p-4 bg-light border-bottom">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width:40px;height:40px;background:linear-gradient(135deg,#4facfe,#00f2fe);">
                        <i class="fas fa-toggle-on"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Status Settings</h4>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card status-card h-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <label class="fw-medium">Active Status</label>
                                    <p class="text-muted small mb-0">Visible to users</p>
                                </div>
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="status"
                                           value="1"
                                           {{ old('status', $review->status ?? true) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= ACTIONS ================= -->
            <div class="px-4 py-3 bg-light border-top">
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('reviews.index') }}" class="btn btn-lg btn-light border">
                        Cancel
                    </a>
                    <button class="btn btn-lg submit-btn">
                        <i class="fas fa-save me-2"></i>
                        {{ isset($review) ? 'Update Review' : 'Create Review' }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
function previewImage(e) {
    const img = document.querySelector('#imagePreview img') || document.createElement('img');
    img.src = URL.createObjectURL(e.target.files[0]);
    img.className = 'rounded shadow';
    img.style.cssText = 'width:150px;height:150px;object-fit:cover;';
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    preview.appendChild(img);
    preview.classList.remove('d-none');
}
</script>
@endsection
