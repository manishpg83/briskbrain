<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\PageMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        $review = Review::count();
        $pagemetadata = PageMetadata::count();


        return view('admin.dashboard',compact('categories','posts','review','pagemetadata'));
    }

}
