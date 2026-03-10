@foreach ($categories as $category)
<tr class="align-middle">
    <td class="fw-semibold">
        {{ $category->name }}
    </td>

    <td class="text-muted">
        {{ Str::limit($category->description, 80) }}
    </td>

    <td>
        @if ($category->image)
            <img src="{{ $category->image }}"
                 alt="Category Image"
                 class="rounded shadow-sm"
                 style="width:70px;height:70px;object-fit:cover;">
        @else
            <span class="badge bg-secondary">No Image</span>
        @endif
    </td>

    <td class="text-end">
        <a href="{{ route('admin.category.edit', $category->id) }}"
           class="btn btn-sm btn-outline-primary me-1"
           title="Edit">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('admin.category.destroy', $category->id) }}"
              method="POST"
              class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-sm btn-outline-danger"
                    title="Delete"
                    onclick="return confirm('Are you sure you want to delete this category?')">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach

@if($categories->hasPages())
<tr>
    <td colspan="4" class="text-center pt-4">
        {{ $categories->links('pagination::bootstrap-5') }}
    </td>
</tr>
@endif
