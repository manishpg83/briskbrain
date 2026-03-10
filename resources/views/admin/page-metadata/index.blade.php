@extends('layouts.master')

@section('title', 'Page Metadata')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Page Metadata</h1>
        <a href="{{ route('admin.page-metadata.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Add Metadata
        </a>
    </div>

    <x-custom-table
        :columns="['Page', 'Title', 'Meta Title', 'Meta Description', 'Actions']"
        :rows="$pageMetadata">

        @forelse($pageMetadata as $row)
            <tr>
                <td class="fw-bold">
                    {{ $pageNames[$row->page_name] ?? $row->page_name }}
                </td>

                <td>{{ $row->title }}</td>

                <td>{{ $row->meta_title }}</td>

                <td>{{ \Illuminate\Support\Str::limit($row->meta_description, 50) }}</td>

                <td>
                    <a href="{{ route('admin.page-metadata.edit', $row->id) }}"
                       class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.page-metadata.destroy', $row->id) }}"
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
                <td colspan="5" class="text-muted text-center">
                    No records found
                </td>
            </tr>
        @endforelse

    </x-custom-table>

</div>
@endsection
