<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Models\PageMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageMetadataController extends Controller
{
    public function index(Request $request)
    {
        $query = PageMetadata::query();

        if ($request->filled('search')) {
            $query->where('page_name', 'like', '%' . $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search . '%')
                ->orWhere('meta_title', 'like', '%' . $request->search . '%')
                ->orWhere('meta_description', 'like', '%' . $request->search . '%');
        }

        $pageMetadata = $query->paginate(
            $request->input('per_page', 5)
        );

        $pageNames = $this->getPageNamesFromRoutes();

        return view('admin.page-metadata.index', compact('pageMetadata', 'pageNames'));
    }

    public function create()
    {
        $pageNames = $this->getPageNamesFromRoutes();
        return view('admin.page-metadata.create', compact('pageNames'));
    }
    public function getMetadata(Request $request)
    {
        $pageName = $request->input('page_name');

        // Try to find existing metadata by page name
        $metadata = PageMetadata::where('page_name', $pageName)->first();

        if ($metadata) {
            // If metadata exists, return it as JSON
            return response()->json(['metadata' => $metadata]);
        } else {
            // If metadata doesn't exist, return an empty JSON response
            return response()->json(['metadata' => null]);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'title' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_locale' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_keywords' => 'nullable|string',
            'og_url' => 'nullable|string',
            'og_site_name' => 'nullable|string'
        ]);

        $data = $request->only([
            'page_name',
            'title',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'og_locale',
            'og_type',
            'og_title',
            'og_description',
            'og_keywords',
            'og_url',
            'og_site_name'
        ]);

        $id = $request->input('id');

        if (empty($id)) {
            PageMetadata::create($data);
            return redirect()->route('admin.page-metadata.create')
                ->with('success', 'Page metadata created successfully');
        } else {
            $metadata = PageMetadata::find($id);
            if (!$metadata) {
                return redirect()->route('admin.page-metadata.create')
                    ->with('error', 'Page metadata not found for updating');
            }
            $metadata->update($data);
            return redirect()->route('admin.page-metadata.create')
                ->with('success', 'Page metadata updated successfully');
        }
    }


    public function edit($id)
    {
        $pageMetadata = PageMetadata::find($id);
        $pageNames = $this->getPageNamesFromRoutes();

        return view('admin.page-metadata.edit', compact('pageMetadata', 'pageNames'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_locale' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_keywords' => 'nullable|string',
            'og_url' => 'nullable|string',
            'og_site_name' => 'nullable|string',
        ]);

        $pageMetadata = PageMetadata::find($id);

        // Update the page metadata record
        $pageMetadata->update([
            'title' => $request->input('title'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'og_locale' => $request->input('og_locale'),
            'og_type' => $request->input('og_type'),
            'og_title' => $request->input('og_title'),
            'og_description' => $request->input('og_description'),
            'og_keywords' => $request->input('og_keywords'),
            'og_url' => $request->input('og_url'),
            'og_site_name' => $request->input('og_site_name'),
        ]);

        return redirect()->route('admin.page-metadata.index')
            ->with('success', 'Page metadata updated successfully');
    }

    public function destroy($id)
    {
        $pageMetadata = PageMetadata::find($id);
        $pageMetadata->delete();

        return redirect()->route('admin.page-metadata.index')
            ->with('success', 'Page metadata deleted successfully');
    }

    private function getPageNamesFromRoutes()
    {
        $routes = Route::getRoutes();
        $pageNames = [];

        foreach ($routes as $route) {
            $name = $route->getName();
            if ($name) {
                $pageNames[$name] = str_replace('.', ' ', ucwords($name));
            }
        }

        return $pageNames;
    }
}
