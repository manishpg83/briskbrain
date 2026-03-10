@extends('layouts.master')

@section('title', 'Reviews')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Reviews</h1>

        <div>
            <a href="{{ url('/#dev') }}" class="btn btn-outline-primary me-2">
                View Page
            </a>
            <a href="{{ url('admin/reviews/create') }}" class="btn btn-warning">
                <i class="fas fa-plus-circle me-1"></i> Add Review
            </a>
        </div>
    </div>

    <x-custom-table
        :columns="['Client Name', 'Designation', 'Review', 'Image', 'Actions']"
        :rows="$reviews">

        @forelse($reviews as $row)
            <tr>
                <td class="fw-bold">{{ $row->client_name }}</td>

                <td>{{ $row->designation }}</td>

                <td>{{ \Illuminate\Support\Str::limit($row->review_text, 50) }}</td>

                <td>
                    @if($row->image)
                        <img src="{{ $row->image }}" class="img-thumbnail" style="max-width:80px">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('reviews.edit', $row->id) }}"
                       class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('reviews.destroy', $row->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this review?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-muted text-center">
                    No reviews found
                </td>
            </tr>
        @endforelse

    </x-custom-table>

</div>
@endsection
