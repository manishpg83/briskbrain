<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\Sitemap\Sitemap;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // Add static routes to the sitemap
        $staticRoutes = [
            route('home'),
            route('about'),
            route('contact'),
            route('portfolio'),
            route('services'),
            route('yii-yii2-development'),
            route('codeigniter-development'),
            route('laravel-development'),
            route('magento-development'),
            route('wordpress-development'),
            route('custom-php-development'),
            route('python-development'),
            route('blog'),
            
        ];

        $sitemap->add($staticRoutes);

       
        $blogPosts = Post::all(); 
        
        foreach ($blogPosts as $post) {
            $sitemap->add(route('blogsingle', $post->slug), $post->updated_at);
        }

        return $sitemap->render();

    }
}