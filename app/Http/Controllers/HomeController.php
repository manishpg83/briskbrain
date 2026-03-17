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
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });
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
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('about', compact('resentpost'));
    }


    public function portfolio()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('portfolio', compact('resentpost'));
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
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('contact', compact('resentpost'));
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

        view()->share('metaTitle', $metaTitle);
        view()->share('metaDescription', $metaDescription);

        return redirect('/thankyou');
        // return redirect()->route('thankyou');
    }

    public function Yii()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('yii-framework-development', compact('resentpost'));
    }

    public function Laravel()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('laravel-development', compact('resentpost'));
    }


    public function python()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('python-development', compact('resentpost'));
    }

    public function Codeigniter()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });
 
        return view('codeigniter-development', compact('resentpost'));
    }

    public function service()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('service', compact('resentpost'));
    }

    public function Magento()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('magento-development', compact('resentpost'));
    }

    public function blog()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });
        return view('blog', compact('resentpost'));
    }

    public function WordPress()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('wordpress-development', compact('resentpost'));
    }

    public function nodejs()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('nodejs-development', compact('resentpost'));
    }
    public function PHP()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('custom-php-development', compact('resentpost'));
    }

    public function Ruby()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('ruby-development', compact('resentpost'));
    }

    public function thankyou()
    {
        $resentpost = cache()->remember('resent_posts_4', 3600, function () {
            return Post::orderBy('created_at', 'DESC')->get()->take(4);
        });

        return view('thankyou', compact('resentpost'));
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
