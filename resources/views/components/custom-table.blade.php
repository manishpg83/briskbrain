@props([
    'columns' => [],
    'rows' => null,
    'search' => true,
    'perPageOptions' => [5, 10, 25, 50],
])

@php
    $searchQuery = request('search', '');
    $perPage = request('per_page', $perPageOptions[0]);
@endphp

<div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
    <div class="card-body p-4">

        {{-- Search & Per Page --}}
        <div class="row mb-3 align-items-center">
            @if($search)
                <div class="col-md-6 mb-2">
                    <form method="GET" class="d-flex gap-2">
                        <input type="text"
                               name="search"
                               value="{{ $searchQuery }}"
                               class="form-control"
                               placeholder="Search..."
                               style="border-radius: 8px; border: 1px solid #dee2e6;">
                        <button class="btn btn-primary" style="border-radius: 8px; padding: 0.5rem 1.5rem;">
                            Search
                        </button>
                    </form>
                </div>
            @endif

            <div class="col-md-6 text-end mb-2">
                <form method="GET" class="d-inline-flex align-items-center gap-2">
                    <label class="text-muted mb-0" style="font-size: 14px;">Show:</label>
                    <select name="per_page"
                            class="form-select form-select-sm"
                            onchange="this.form.submit()"
                            style="width: auto; border-radius: 8px; border: 1px solid #dee2e6;">
                        @foreach($perPageOptions as $option)
                            <option value="{{ $option }}"
                                {{ $perPage == $option ? 'selected' : '' }}>
                                {{ $option }} entries
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="table-responsive" style="border-radius: 10px; overflow: hidden; border: 1px solid #e9ecef;">
            <table class="table table-hover align-middle text-center mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        @foreach($columns as $column)
                            <th class="py-3 px-4 text-uppercase" 
                                style="font-size: 13px; font-weight: 600; color: #495057; letter-spacing: 0.5px; border-bottom: 2px solid #dee2e6;">
                                {{ $column }}
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody style="background-color: #ffffff;">
                    {{ $slot }} {{-- rows rendered by parent --}}
                </tbody>
            </table>
        </div>

        {{-- Custom Pagination --}}
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted" style="font-size: 14px;">
                Showing 
                <span class="fw-semibold">{{ $rows->firstItem() ?? 0 }}</span> 
                to 
                <span class="fw-semibold">{{ $rows->lastItem() ?? 0 }}</span> 
                of 
                <span class="fw-semibold">{{ $rows->total() }}</span> 
                entries
            </div>
            
            <nav aria-label="Page navigation">
                <ul class="pagination custom-pagination mb-0">
                    {{-- Previous Button --}}
                    @if ($rows->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $rows->appends(request()->all())->previousPageUrl() }}">«</a>
                        </li>
                    @endif

                    {{-- Page Numbers --}}
                    @php
                        $currentPage = $rows->currentPage();
                        $lastPage = $rows->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    {{-- First Page --}}
                    @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $rows->appends(request()->all())->url(1) }}">1</a>
                        </li>
                        @if($start > 2)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endif

                    {{-- Page Range --}}
                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $currentPage)
                            <li class="page-item active">
                                <span class="page-link">{{ $i }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $rows->appends(request()->all())->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if($end < $lastPage)
                        @if($end < $lastPage - 1)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $rows->appends(request()->all())->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    {{-- Next Button --}}
                    @if ($rows->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $rows->appends(request()->all())->nextPageUrl() }}">»</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">»</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>

<style>
    /* Custom Pagination Styles */
    .custom-pagination {
        display: flex;
        gap: 6px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-pagination .page-item {
        margin: 0;
    }

    .custom-pagination .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 500;
        color: #495057;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .custom-pagination .page-link:hover {
        background-color: #e9ecef;
        border-color: #adb5bd;
        color: #212529;
    }

    .custom-pagination .page-item.active .page-link {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
        color: #ffffff;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(13, 202, 240, 0.3);
    }

    .custom-pagination .page-item.disabled .page-link {
        background-color: #f8f9fa;
        border-color: #dee2e6;
        color: #adb5bd;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Previous and Next arrows */
    .custom-pagination .page-item:first-child .page-link,
    .custom-pagination .page-item:last-child .page-link {
        font-size: 16px;
        font-weight: 600;
    }

    /* Table Row Styles */
    .table-hover tbody tr {
        transition: background-color 0.2s ease;
        border-bottom: 1px solid #f1f3f5;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:last-child {
        border-bottom: none;
    }

    /* Button Styles */
    .btn-sm {
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .btn-sm:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Image Thumbnail */
    .img-thumbnail {
        border-radius: 6px;
        border: 1px solid #dee2e6;
        padding: 4px;
        background-color: #fff;
    }

    /* Card Styles */
    .card {
        background-color: #ffffff;
        border: 1px solid #e9ecef;
    }
</style>