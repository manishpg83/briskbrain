@extends('layouts.master')

@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Category</h1>
        <a href="{{ url('admin/add-category') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Add Category
        </a>
    </div>

    <x-custom-table
        :columns="['Name', 'Description', 'Image', 'Actions']"
        :rows="$categories">

        @forelse($categories as $row)
            <tr>
                <td class="fw-bold">{{ $row->name }}</td>

                <td>{{ \Illuminate\Support\Str::limit($row->description, 50) }}</td>

                <td>
                    @if($row->image)
                        <img src="{{ $row->image }}" class="img-thumbnail" style="max-width:80px">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.category.edit', $row->id) }}"
                       class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.category.destroy', $row->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-muted">No records found</td>
            </tr>
        @endforelse

    </x-custom-table>

</div>
@endsection
