<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Review;
use App\Models\PageMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class FrontendController extends Controller
{
  public function index()
  { 
    $resentpost = cache()->remember('resent_posts_home', 3600, function () {
        return Post::orderBy('created_at', 'DESC')->where('status', 0)->take(5)->get();
    });

    
    $reviews = cache()->remember('all_reviews', 3600, function () {
        return Review::all();
    });

    return view('frontend.index', compact('resentpost', 'reviews'));
  }

  public function blog($month = null)
  { 
    $latestpost = cache()->remember('latest_posts_3', 3600, function () {
        return Post::orderBy('created_at', 'DESC')->where('status', 0)->take(3)->get();
    });
    
    $resentpost = cache()->remember('resent_posts_home', 3600, function () {
        return Post::orderBy('created_at', 'DESC')->where('status', 0)->take(5)->get();
    });

    $posts = Post::orderBy('created_at', 'DESC')->where('status', 0);

    if ($month) {
      $posts = $posts->whereMonth('created_at', Carbon::parse($month)->month);
    }

    $posts = $posts->paginate(3);

    $archives = cache()->remember('blog_archives', 86400, function () {
        return Post::all()
          ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('F Y');
          })
          ->map(function ($group) {
            return $group->take(3)->sortBy('created_at');
          });
    });

    // Metadata is shared globally by PageMetadataMiddleware as $pageMetadata

    return view('blog', compact('posts', 'latestpost', 'resentpost', 'archives'));
  }


  public function blogsingle($slug)
  {
    $resentpost = cache()->remember('resent_posts_home', 3600, function () {
        return Post::orderBy('created_at', 'DESC')->where('status', 0)->take(5)->get();
    });

    $latestposts = cache()->remember('latest_posts_3', 3600, function () {
        return Post::orderBy('created_at', 'DESC')->where('status', 0)->take(3)->get();
    });

    $viewblogs = Post::where('slug', $slug)->first();

    if (!$viewblogs) {
      abort(404);
    }

    $comments = $viewblogs->comments;

    $archives = cache()->remember('blog_archives_full', 86400, function () {
        return Post::all()
          ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('F Y');
          })
          ->map(function ($group) {
            return $group->sortBy('created_at');
          });
    });

    return view('blogsingle', compact('viewblogs', 'latestposts', 'resentpost', 'archives', 'slug'));
  }
}
