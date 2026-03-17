<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PageMetadataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRouteName = Route::currentRouteName();

        $pageMetadata = cache()->remember("page_metadata_{$currentRouteName}", 86400, function () use ($currentRouteName) {
            return PageMetadata::where('page_name', $currentRouteName)->first();
        });
    
        view()->share('pageMetadata', $pageMetadata);

        $metaTitle = $pageMetadata ? $pageMetadata->title : "Top Web Development Services provider - BriskBrain Technologies";
        $title = $pageMetadata ? $pageMetadata->title : "BriskBrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Top Web Development Service Provider Company, Laravel, Vue.js, Node.Js, Magento 2, CodeIgniter, Yii, Wordpress, Ruby onRails, ROR, Mobile app, IoT, Restful APIs, Payment Gateway, Web Design, Responsive Design, Top Web Development Company in Ahmedabad, Top Web Development Company in India";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        view()->share('metaTitle', $metaTitle);
        view()->share('title', $title);
        view()->share('metaDescription', $metaDescription);
        view()->share('metaKeywords', $metaKeywords);
        view()->share('metakeywords', $metaKeywords);
    
        return $next($request);
    }
}
