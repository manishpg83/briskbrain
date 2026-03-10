@extends('layouts.master')

@section('title', 'Posts')

@section('content')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Posts</h1>
        <div class="button-container">
            <a href="{{ url('admin/add-post') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Add Posts
            </a>
            <a href="{{ url('/blog') }}" class="btn btn-warning" target="_blank">
                <i class="fas fa-eye me-1"></i> View Posts
            </a>
        </div>
    </div>

    <x-custom-table
        :columns="['Category', 'Name', 'Description', 'Status', 'Image', 'Actions']"
        :rows="$data">

        @forelse($data as $post)
            <tr>
                <td>{{ $post->category->name ?? '-' }}</td>

                <td class="fw-bold">{{ $post->name }}</td>

                <td>
                    {!! \Illuminate\Support\Str::limit(strip_tags($post->description), 100) !!}
                </td>

                <td>
                    @if($post->status)
                    <span class="badge bg-secondary">Inactive</span>
                    @else
                    <span class="badge bg-success">Active</span>
                    @endif
                </td>

                <td>
                    @if($post->image)
                        <img src="{{ $post->image }}"
                             class="img-thumbnail"
                             style="max-width: 80px;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('blogsingle', ['slug' => $post->slug]) }}"
                       class="btn btn-sm btn-info"
                       target="_blank">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('edit-post', $post->id) }}"
                       class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('delete-post', $post->id) }}"
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
                <td colspan="6" class="text-muted">No posts found</td>
            </tr>
        @endforelse

    </x-custom-table>

</div>
@endsection
