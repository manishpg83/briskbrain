<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\QuoteRequest;
use App\Models\PageMetadata;
use Illuminate\Http\Request;
use App\Mail\UserQuoteRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        return view('home', compact('resentpost'));
    }

    public function clearConfigCache()
    {
        // Clear the configuration cache
        Artisan::call('config:cache');

        return 'Configuration cache cleared!';
    }


    public function about()
    {
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        
        // Standard meta tags
        $title = $pageMetadata ? $pageMetadata->title : "about | BriskBrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "BriskBrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Open Graph meta tags
        $ogTitle = $pageMetadata ? $pageMetadata->og_title : $metaTitle;
        $ogDescription = $pageMetadata ? $pageMetadata->og_description : $metaDescription;
        $ogImage = $pageMetadata ? $pageMetadata->og_image : asset('assets/frontend/img/default-og-image.jpg');
        $ogUrl = route('about');  // Assuming you have a named route 'about'
        $ogLocale = $pageMetadata ? $pageMetadata->og_locale : 'en_US';
        $ogType = $pageMetadata ? $pageMetadata->og_type : 'website';
        $ogSiteName = $pageMetadata ? $pageMetadata->og_site_name : 'BriskBrain';

        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);

        return view('about', compact(
            'metaTitle', 'resentpost', 'title', 'metaDescription', 'metaKeywords',
            'ogTitle', 'ogDescription', 'ogImage', 'ogUrl', 'ogLocale', 'ogType', 'ogSiteName'
        ));
    }


    public function portfolio()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "portfolio|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('portfolio', compact('metaTitle', 'resentpost', 'title', 'metaDescription', 'metaKeywords'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'designation' => 'required|string',
            'number' => 'required|string',
            'country' => 'required|string',
            'company' => 'required|string',
            'requirement' => 'required|string',
            'description' => 'required|string',
        ]);
        $submissionTime = time();
        $formTime = $request->input('timestamp');
        if (($submissionTime - $formTime) < 35) {
            return redirect('/thankyou');
        }
        if ($request->input('foo') != '2') {
            return redirect('/thankyou');
        }
        if (!empty($request->input('honeypot'))) {
            return redirect('/thankyou');
        }
        if ($request->faxonly) {
            return redirect('/thankyou');
        }
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $currentDate = now()->format('F d');
        $subject = "Quote Request - $currentDate";

        Mail::to('briskbraintechnologies@gmail.com')->send(new QuoteRequest($validatedData, $subject));

        Mail::to($validatedData['email'])->send(new UserQuoteRequest($validatedData));

        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "contact|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        return redirect('/thankyou');
    }


    public function contact()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Contact | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('contact', compact('metaTitle', 'resentpost', 'title', 'metaDescription', 'metaKeywords'));
    }

    public function sendEmail(Request $request)
    {
        Mail::to('hello@briskbraintech.com')->send(new ContactFormSubmitted($request->all()));
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "contact|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        //return view('contact', compact('metaTitle','resentpost', 'title','metaDescription'));
        return redirect('/thankyou');
        // return redirect()->route('thankyou');
    }

    public function Yii()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Yii|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('yii-framework-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function Laravel()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Laravel|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('laravel-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }


    public function python()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "python|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('python-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function Codeigniter()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Codeigniter|Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);
        view()->share('metakeywords', $metaKeywords);

        return view('codeigniter-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function service()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "service | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";


        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('service', compact('metaTitle', 'title', 'resentpost', 'metaDescription'));
    }

    public function Magento()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Magento | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('magento-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function blog()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        return view('blog');
    }

    public function WordPress()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "WordPress | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('wordpress-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function nodejs()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "nodejs | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('nodejs-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }
    public function PHP()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "PHP | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('custom-php-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function Ruby()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Ruby | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";

        // Pass the meta data to the view
        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return view('ruby-development', compact('metaTitle', 'title', 'resentpost', 'metaDescription', 'metaKeywords'));
    }

    public function thankyou()
    {
        $resentpost = Post::orderBy('created_at', 'DESC')->get()->take(4);
        $routeName = Route::currentRouteName();
        $pageMetadata = PageMetadata::where('page_name', $routeName)->first();
        $title = $pageMetadata ? $pageMetadata->title : "Contact | Briksbrain";
        $metaTitle = $pageMetadata ? $pageMetadata->meta_title : "Briksbrain";
        $metaDescription = $pageMetadata ? $pageMetadata->meta_description : "Learn more about our high-end and cost-effective website development services at BriskBrain.";
        $metaKeywords = $pageMetadata ? $pageMetadata->meta_keywords : "BriskBrain";


        return view('thankyou', compact('metaTitle', 'resentpost', 'title', 'metaDescription', 'metaKeywords')); // Assuming 'thankyou' is the name of your view file
    }
    public function validateEmail(Request $request)
    {
        $email = $request->input('email');
        $verifaliaApiKey = 'a8566a6e0d1b469b9aef30abb5791114';
        $apiUrl = "https://api.verifalia.com/v2.1/email/verify?email=" . urlencode($email) . "&apikey=" . $verifaliaApiKey;

        $client = new Client();

        try {
            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody(), true);

            if ($data['status'] === 'valid') {
                return response()->json(['status' => 'valid']);
            } else {
                return response()->json(['status' => 'invalid']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
