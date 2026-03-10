<nav class="sb-topnav navbar navbar-expand shadow-sm topbar">

    {{-- Brand --}}
    @php
        $setting = App\Models\Settings::find(1);
    @endphp

    <a class="navbar-brand d-flex align-items-center ps-3 fw-semibold" href="{{ url('/') }}">
        <i class="bi bi-box-fill me-2 text-primary"></i>
        {{ $setting?->website_name }}
    </a>

    {{-- Sidebar Toggle --}}
    <button class="btn btn-link text-white ms-2 me-3" id="sidebarToggle">
        <i class="bi bi-list fs-4"></i>
    </button>

    {{-- Spacer --}}
    <div class="flex-grow-1"></div>

    {{-- User Menu --}}
    <ul class="navbar-nav me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
               href="#"
               id="navbarDropdown"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                <div class="avatar-circle">
                    <i class="bi bi-person-fill"></i>
                </div>

                <span class="d-none d-md-inline fw-medium">
                    {{ Auth::user()->name }}
                </span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                <li>
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ url('admin/settings') }}">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item d-flex align-items-center text-danger logout-link"
                       href="#">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

</nav>

{{-- Include SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Top Navbar */
    .topbar {
        background: #ffffff;
        height: 64px;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Brand */
    .navbar-brand {
        font-size: 1rem;
        letter-spacing: 0.3px;
        color: #111827 !important;
    }

    /* Sidebar toggle */
    #sidebarToggle {
        color: #334155 !important;
        opacity: 0.8;
        transition: 0.2s;
    }

    #sidebarToggle:hover {
        opacity: 1;
        transform: scale(1.05);
    }

    /* Avatar */
    .avatar-circle {
        width: 34px;
        height: 34px;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
    }

    /* User name */
    .nav-link span {
        color: #1f2937;
    }

    /* Dropdown */
    .dropdown-menu {
        border-radius: 12px;
        padding: 8px;
        border: 1px solid #e5e7eb;
    }

    .dropdown-item {
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 0.9rem;
        color: #1f2937;
    }

    .dropdown-item:hover {
        background: #f1f5f9;
    }

    .dropdown-item.text-danger:hover {
        background: #fee2e2;
    }

    /* SweetAlert Customization */
    .swal2-confirm {
        background-color: #dc3545 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutLink = document.querySelector('.logout-link');
        
        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out of your account!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, logout!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-lg',
                        confirmButton: 'btn-logout-confirm',
                        cancelButton: 'btn-logout-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the logout form
                        document.getElementById('logout-form').submit();
                    }
                });
            });
        }
    });
</script>