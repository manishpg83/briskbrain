@php
    $dashboardActive = Request::is('admin/dashboard');

    $categoryActive = Request::is('admin/category*') || Request::is('admin/add-category');

    $postActive = Request::is('admin/posts*') || Request::is('admin/post*') || Request::is('admin/add-post') || Request::is('admin/page-metadata*');

    $reviewActive = Request::is('admin/reviews*');

    $settingsActive = Request::is('admin/settings');
@endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion border-end" id="sidenavAccordion">

        <div class="sb-sidenav-menu px-2">
            <div class="nav">

                {{-- ================= MAIN ================= --}}
                <div class="sb-sidenav-menu-heading mt-3">MAIN</div>

                <a class="nav-link sidebar-link {{ $dashboardActive ? 'active' : '' }}"
                   href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>

                {{-- ================= CONTENT ================= --}}
                <div class="sb-sidenav-menu-heading mt-4">CONTENT</div>

                {{-- Category --}}
                <a class="nav-link sidebar-link {{ $categoryActive ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   href="#menuCategory">
                    <i class="bi bi-grid-1x2-fill me-2"></i>
                    Category
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse {{ $categoryActive ? 'show' : '' }}" id="menuCategory">
                    <a class="nav-link sub-link {{ Request::is('admin/add-category') ? 'active' : '' }}"
                       href="{{ url('admin/add-category') }}">
                        <i class="bi bi-plus-circle me-2"></i> Add Category
                    </a>

                    <a class="nav-link sub-link {{ Request::is('admin/category') ? 'active' : '' }}"
                       href="{{ url('admin/category') }}">
                        <i class="bi bi-list-ul me-2"></i> View Categories
                    </a>
                </div>

                {{-- Posts --}}
                <a class="nav-link sidebar-link {{ $postActive ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   href="#menuPosts">
                    <i class="bi bi-journal-text me-2"></i>
                    Posts
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse {{ $postActive ? 'show' : '' }}" id="menuPosts">
                    <a class="nav-link sub-link {{ Request::is('admin/add-post') ? 'active' : '' }}"
                       href="{{ url('admin/add-post') }}">
                        <i class="bi bi-pencil-square me-2"></i> Add Post
                    </a>

                    <a class="nav-link sub-link {{ Request::is('admin/posts') ? 'active' : '' }}"
                       href="{{ url('admin/posts') }}">
                        <i class="bi bi-eye me-2"></i> View Posts
                    </a>

                    <a class="nav-link sub-link {{ Request::is('admin/page-metadata*') ? 'active' : '' }}"
                       href="{{ url('admin/page-metadata') }}">
                        <i class="bi bi-diagram-3 me-2"></i> Page Metadata
                    </a>
                </div>

                {{-- Reviews --}}
                <a class="nav-link sidebar-link {{ $reviewActive ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   href="#menuReviews">
                    <i class="bi bi-star-fill me-2"></i>
                    Reviews
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse {{ $reviewActive ? 'show' : '' }}" id="menuReviews">
                    <a class="nav-link sub-link {{ Request::is('admin/reviews/create') ? 'active' : '' }}"
                       href="{{ url('admin/reviews/create') }}">
                        <i class="bi bi-plus-square me-2"></i> Add Review
                    </a>

                    <a class="nav-link sub-link {{ Request::is('admin/reviews') ? 'active' : '' }}"
                       href="{{ url('admin/reviews') }}">
                        <i class="bi bi-chat-left-text me-2"></i> View Reviews
                    </a>
                </div>

                {{-- ================= SYSTEM ================= --}}
                <div class="sb-sidenav-menu-heading mt-4">SYSTEM</div>

                <a class="nav-link sidebar-link {{ $settingsActive ? 'active' : '' }}"
                   href="{{ url('admin/settings') }}">
                    <i class="bi bi-gear-fill me-2"></i>
                    Settings
                </a>

            </div>
        </div>

        {{-- Footer --}}
        <div class="sb-sidenav-footer text-center py-3">
            <div class="small text-muted">Logged in as</div>
            <strong>{{ Auth::user()->name }}</strong>
        </div>

    </nav>
</div>

<style>
    /* ==============================
   WHITE SAAS SIDEBAR THEME
============================== */

/* Sidebar base */
.sb-sidenav {
    background: #ffffff;
    font-size: 0.95rem;
    border-right: 1px solid #e5e7eb;
    box-shadow: 4px 0 20px rgba(15, 23, 42, 0.04);
}

/* Sidebar menu wrapper */
.sb-sidenav-menu {
    padding-top: 1rem;
}

/* Section headings (MAIN, CONTENT, SYSTEM) */
.sb-sidenav-menu-heading {
    color: #9ca3af;
    font-size: 0.7rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 18px 16px 8px;
}

/* Main sidebar links */
.sidebar-link {
    color: #1f2937 !important;
    border-radius: 12px;
    padding: 12px 16px;
    margin: 4px 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
    transition: all 0.25s ease;
}

/* Hover */
.sidebar-link:hover {
    background: #f1f5f9;
    color: #111827 !important;
}

/* Active item (matches dashboard blue) */
.sidebar-link.active {
    background: linear-gradient(135deg, #6366f1, #4f46e5);
    color: #ffffff !important;
    box-shadow: 0 10px 25px rgba(79, 70, 229, 0.35);
}

/* Icons */
.sidebar-link i {
    font-size: 1.05rem;
}

/* Sub-menu links */
.sub-link {
    padding: 10px 48px;
    margin: 4px 14px;
    border-radius: 10px;
    font-size: 0.9rem;
    color: #6b7280 !important;
    transition: all 0.2s ease;
}

/* Sub hover */
.sub-link:hover {
    background: #f8fafc;
    color: #111827 !important;
}

/* Active sub link */
.sub-link.active {
    background: #eef2ff;
    color: #4f46e5 !important;
    font-weight: 600;
}

/* Collapse arrow */
.sidebar-link .bi-chevron-down {
    font-size: 0.75rem;
    opacity: 0.6;
}

/* Rotate arrow when open */
.sidebar-link.active .bi-chevron-down {
    transform: rotate(180deg);
}

/* Sidebar footer */
.sb-sidenav-footer {
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
    color: #374151;
    font-size: 0.85rem;
}


</style>