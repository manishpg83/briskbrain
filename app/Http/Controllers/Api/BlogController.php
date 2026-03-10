<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Fetch a list of blog posts with a limit of 10 per request
    public function index(Request $request)
    {
        // You can add pagination or filters as needed
        $posts = Post::orderBy('created_at', 'DESC')
                    ->where('status', 0) // Only show active posts
                    ->paginate(4); // Adjust pagination as needed

        // Return the posts as a JSON response
        return response()->json($posts);
    }

    // Fetch a single blog post by slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // Return a 404 response if the post is not found
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Return the post data as a JSON response
        return response()->json($post);
    }
}
