@extends('layouts.master')

@section('title', 'Website Settings')

@section('content')

<div class="container-fluid px-4 py-4">
    
    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3 mb-2">
            <div class="btn btn-light border shadow-sm d-flex align-items-center justify-content-center"
                 style="width: 40px; height: 40px;">
                <i class="fas fa-cog"></i>
            </div>
            <h1 class="fw-bold mb-0">Website Settings</h1>
        </div>
        <p class="text-muted small ms-5 ps-2">Configure your website's basic information and settings</p>
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
        
        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
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
                    <!-- Website Name -->
                    <div class="col-md-6">
                        <label for="website_name" class="form-label fw-medium">
                            Website Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="website_name" 
                               id="website_name"
                               value="{{ $setting ? $setting->website_name : old('website_name') }}"
                               class="form-control form-control-lg border-2 @error('website_name') is-invalid border-danger @enderror"
                               placeholder="Enter website name">
                        @error('website_name')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Website Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium">
                            Website Email <span class="text-danger">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               id="email"
                               value="{{ $setting ? $setting->email : old('email') }}"
                               class="form-control form-control-lg border-2 @error('email') is-invalid border-danger @enderror"
                               placeholder="contact@example.com">
                        @error('email')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Website Mobile -->
                    <div class="col-md-6">
                        <label for="mobile" class="form-label fw-medium">
                            Website Mobile <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="mobile" 
                               id="mobile"
                               value="{{ $setting ? $setting->mobile : old('mobile') }}"
                               class="form-control form-control-lg border-2 @error('mobile') is-invalid border-danger @enderror"
                               placeholder="+1 234 567 8900">
                        @error('mobile')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Website Address -->
                    <div class="col-12">
                        <label for="address" class="form-label fw-medium">
                            Website Address
                        </label>
                        <textarea name="address" 
                                  id="address"
                                  rows="4"
                                  class="form-control border-2 @error('address') is-invalid border-danger @enderror"
                                  placeholder="Enter website address">{{ $setting ? $setting->address : old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Logo Section -->
            <div class="p-4 border-bottom bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 40px; height: 40px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                        <i class="fas fa-image"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Branding</h4>
                </div>

                <div class="row g-4">
                    <!-- Logo Upload -->
                    <div class="col-12">
                        <label for="logo" class="form-label fw-medium">
                            Website Logo
                        </label>
                        <div class="position-relative">
                            <input type="file" 
                                   name="logo" 
                                   id="logo"
                                   accept="image/*"
                                   class="d-none"
                                   onchange="previewLogo(event)">
                            <label for="logo" 
                                   class="form-control border-2 border-dashed text-center py-5 cursor-pointer upload-area @error('logo') border-danger bg-danger bg-opacity-10 @enderror"
                                   style="cursor: pointer; min-height: 180px; display: flex; align-items: center; justify-content: center;">
                                <div>
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <p class="mb-2">
                                        <span class="fw-semibold text-primary">Click to upload</span> 
                                        <span class="text-muted">or drag and drop</span>
                                    </p>
                                    <p class="small text-muted mb-0">PNG, JPG, SVG up to 5MB</p>
                                </div>
                            </label>
                            
                            <!-- Logo Preview -->
                            <div id="logoPreview" class="mt-3 {{ $setting && $setting->logo ? '' : 'd-none' }}">
                                <div class="d-flex align-items-center gap-3 p-3 bg-white border rounded-3 shadow-sm">
                                    @if($setting && $setting->logo)
                                        <img src="{{ asset($setting->logo) }}" 
                                             alt="Current Logo" 
                                             class="rounded-2" 
                                             style="width: 100px; height: 100px; object-fit: contain; border: 1px solid #dee2e6;">
                                        <div>
                                            <p class="mb-1 fw-medium">Current Logo</p>
                                            <p class="small text-muted mb-0">Upload a new file to replace</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- New Logo Preview -->
                            <div id="newLogoPreview" class="mt-3 d-none">
                                <div class="d-flex align-items-center gap-3 p-3 bg-white border border-success rounded-3 shadow-sm">
                                    <img src="" 
                                         alt="New Logo" 
                                         class="rounded-2" 
                                         style="width: 100px; height: 100px; object-fit: contain; border: 1px solid #dee2e6;">
                                    <div>
                                        <p class="mb-1 fw-medium text-success">
                                            <i class="fas fa-check-circle me-1"></i>
                                            New Logo Selected
                                        </p>
                                        <p class="small text-muted mb-0">This will replace the current logo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('logo')
                            <div class="text-danger small mt-2 d-flex align-items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-4 py-3 bg-light border-top">
                <div class="d-flex justify-content-end gap-3">
                    <button type="reset" 
                            class="btn btn-lg btn-light border shadow-sm">
                        <i class="fas fa-redo me-2"></i>
                        Reset
                    </button>
                    <button type="submit" 
                            class="btn btn-lg btn-primary shadow submit-btn">
                        <i class="fas fa-save me-2"></i>
                        Save Settings
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

/* Logo Preview */
#logoPreview img,
#newLogoPreview img {
    transition: transform 0.3s ease;
}

#logoPreview img:hover,
#newLogoPreview img:hover {
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
// TinyMCE initialization for address field
tinymce.init({
    selector: '#address',
    height: 200,
    menubar: false,
    plugins: 'lists link',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link',
    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }'
});

// Logo preview function
function previewLogo(event) {
    const file = event.target.files[0];
    const newPreview = document.getElementById('newLogoPreview');
    const newPreviewImg = newPreview?.querySelector('img');
    
    if (file && newPreview && newPreviewImg) {
        const reader = new FileReader();
        reader.onload = function(e) {
            newPreviewImg.src = e.target.result;
            newPreview.classList.remove('d-none');
            
            // Hide current logo preview if exists
            const currentPreview = document.getElementById('logoPreview');
            if (currentPreview) {
                currentPreview.classList.add('d-none');
            }
        }
        reader.readAsDataURL(file);
    }
}

// Form validation and submission
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form?.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('.submit-btn');
        if (submitBtn) {
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            submitBtn.disabled = true;
        }
    });

    // Reset button functionality
    const resetBtn = document.querySelector('button[type="reset"]');
    resetBtn?.addEventListener('click', function() {
        // Reset TinyMCE
        tinymce.get('address')?.setContent('{{ $setting ? addslashes($setting->address) : "" }}');
        
        // Reset logo preview
        const newPreview = document.getElementById('newLogoPreview');
        const currentPreview = document.getElementById('logoPreview');
        
        if (newPreview) newPreview.classList.add('d-none');
        if (currentPreview) currentPreview.classList.remove('d-none');
        
        // Clear file input
        document.getElementById('logo').value = '';
    });
});
</script>

@endsection