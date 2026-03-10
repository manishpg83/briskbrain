@extends('layouts.master')
@section('title','Blog Dashboard')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 fw-bold">Dashboard</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-muted">Overview</li>
    </ol>

    <div class="row g-4">

        <!-- Categories -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card bg-gradient-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 small text-uppercase opacity-75">Total Categories</p>
                        <h2 class="fw-bold mb-0">{{ $categories }}</h2>
                    </div>
                    <i class="fas fa-list-alt fa-3x opacity-50"></i>
                </div>
                <div class="card-footer border-0 bg-transparent text-end">
                    <a href="{{ url('admin/category') }}" class="text-white text-decoration-none fw-semibold">
                        View Details <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card bg-gradient-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 small text-uppercase opacity-75">Total Posts</p>
                        <h2 class="fw-bold mb-0">{{ $posts }}</h2>
                    </div>
                    <i class="fas fa-pen-nib fa-3x opacity-50"></i>
                </div>
                <div class="card-footer border-0 bg-transparent text-end">
                    <a href="{{ url('admin/posts') }}" class="text-white text-decoration-none fw-semibold">
                        View Details <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Page Metadata -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card bg-gradient-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 small text-uppercase opacity-75">Page Metadata</p>
                        <h2 class="fw-bold mb-0">{{ $pagemetadata }}</h2>
                    </div>
                    <i class="fas fa-file-alt fa-3x opacity-50"></i>
                </div>
                <div class="card-footer border-0 bg-transparent text-end">
                    <a href="{{ url('admin/page-metadata') }}" class="text-white text-decoration-none fw-semibold">
                        View Details <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card bg-gradient-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 small text-uppercase opacity-75">Total Reviews</p>
                        <h2 class="fw-bold mb-0">{{ $review }}</h2>
                    </div>
                    <i class="fas fa-star fa-3x opacity-50"></i>
                </div>
                <div class="card-footer border-0 bg-transparent text-end">
                    <a href="{{ url('admin/reviews') }}" class="text-white text-decoration-none fw-semibold">
                        View Details <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts Row -->
    <div class="row g-4 mt-2">
        <!-- Posts Growth Chart -->
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-line text-primary me-2"></i>
                        Posts Growth - Last 7 Days
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="postsChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Category Distribution -->
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-pie text-warning me-2"></i>
                        Category Distribution
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Sections -->
    <div class="row g-4 mt-2">
        <!-- Recent Activity -->
        <div class="col-xl-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-history text-success me-2"></i>
                        Recent Activity
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @php
                            $activities = [
                                ['icon' => 'fa-plus-circle', 'color' => 'primary', 'title' => 'New Post Created', 'desc' => 'You published "Getting Started with Laravel"', 'time' => '2 hours ago'],
                                ['icon' => 'fa-star', 'color' => 'warning', 'title' => 'New Review', 'desc' => 'John Doe rated 5 stars', 'time' => '4 hours ago'],
                                ['icon' => 'fa-file-alt', 'color' => 'success', 'title' => 'Metadata Updated', 'desc' => 'Homepage SEO optimized', 'time' => '1 day ago'],
                                ['icon' => 'fa-list-alt', 'color' => 'info', 'title' => 'Category Added', 'desc' => 'New category "Technology" created', 'time' => '2 days ago'],
                                ['icon' => 'fa-users', 'color' => 'secondary', 'title' => 'Visitor Growth', 'desc' => '250+ visitors this week', 'time' => '3 days ago'],
                            ];
                        @endphp
                        
                        @foreach($activities as $activity)
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-gradient-{{ $activity['color'] }} text-white d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <i class="fas {{ $activity['icon'] }}"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">{{ $activity['title'] }}</h6>
                                    <p class="text-muted mb-1 small">{{ $activity['desc'] }}</p>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted">{{ $activity['time'] }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3 text-center">
                    <a href="#" class="text-decoration-none fw-semibold text-primary">
                        View All Activities <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions & System Status -->
        <div class="col-xl-6">
            <div class="row g-4 h-100">
                <!-- Quick Actions -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">
                                <i class="fas fa-bolt text-info me-2"></i>
                                Quick Actions
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary w-100 mb-2 text-start">
                                        <i class="fas fa-plus-circle me-2"></i>Add Category
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('admin/add-post') }}" class="btn btn-warning w-100 mb-2 text-start">
                                        <i class="fas fa-plus-circle me-2"></i>Create Post
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('admin/page-metadata/create') }}" class="btn btn-success w-100 mb-2 text-start">
                                        <i class="fas fa-plus-circle me-2"></i>Add Metadata
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('admin/settings') }}" class="btn btn-info w-100 mb-2 text-start">
                                        <i class="fas fa-cog me-2"></i>Settings
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">
                                <i class="fas fa-server text-secondary me-2"></i>
                                System Status
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-3 border rounded">
                                        <div class="me-3">
                                            <i class="fas fa-check-circle text-success fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Online</p>
                                            <p class="mb-0 text-muted small">Server Status</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-3 border rounded">
                                        <div class="me-3">
                                            <i class="fas fa-database text-primary fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Connected</p>
                                            <p class="mb-0 text-muted small">Database</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-3 border rounded">
                                        <div class="me-3">
                                            <i class="fas fa-bolt text-warning fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Optimized</p>
                                            <p class="mb-0 text-muted small">Cache</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-3 border rounded">
                                        <div class="me-3">
                                            <i class="fas fa-shield-alt text-success fa-2x"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Secure</p>
                                            <p class="mb-0 text-muted small">Security</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Styles --}}
<style>
.dashboard-card {
    border-radius: 1rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #4e73df, #224abe);
}
.bg-gradient-warning {
    background: linear-gradient(135deg, #f6c23e, #dda20a);
}
.bg-gradient-success {
    background: linear-gradient(135deg, #1cc88a, #13855c);
}
.bg-gradient-info {
    background: linear-gradient(135deg, #36b9cc, #258391);
}
.bg-gradient-secondary {
    background: linear-gradient(135deg, #858796, #6c757d);
}

.card {
    border-radius: 0.75rem;
}

.list-group-item {
    border-left: none;
    border-right: none;
}
.list-group-item:first-child {
    border-top: none;
}
.list-group-item:last-child {
    border-bottom: none;
}

.btn {
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.2s ease;
}
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.border {
    border-color: #e3e6f0 !important;
}
</style>

{{-- Chart.js Script --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Posts Growth Chart
    const postsCtx = document.getElementById('postsChart').getContext('2d');
    const postsChart = new Chart(postsCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Posts Created',
                data: [12, 19, 8, 15, 22, 18, 25],
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                borderColor: '#4e73df',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }, {
                label: 'Posts Published',
                data: [8, 12, 6, 10, 18, 15, 20],
                backgroundColor: 'rgba(246, 194, 62, 0.1)',
                borderColor: '#f6c23e',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Category Distribution Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Technology', 'Lifestyle', 'Business', 'Travel', 'Food'],
            datasets: [{
                data: [35, 20, 15, 15, 15],
                backgroundColor: [
                    '#4e73df',
                    '#f6c23e',
                    '#1cc88a',
                    '#36b9cc',
                    '#858796'
                ],
                borderWidth: 0,
                hoverOffset: 20
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                    }
                }
            }
        }
    });

    // Animate numbers in stats cards
    const counters = document.querySelectorAll('.dashboard-card h2');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        const duration = 1500;
        const step = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
});
</script>
@endsection