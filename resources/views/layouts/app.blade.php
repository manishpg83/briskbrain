<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'BriskBrain')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="title" content="@yield('meta-title', 'BriskBrain')">
    <meta name="description" content="@yield('meta-description', 'BriskBrain.')">
    <meta name="keywords" content="@yield('meta-keywords', 'BriskBrain.')">

    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="@yield('og-locale', 'en_US')" />
    <meta property="og:title" content="@yield('og-title', 'BriskBrain')" />
    <meta property="og:description" content="@yield('og-description', 'BriskBrain.')" />
    <meta property="og:url" content="@yield('og-url', url()->current())" />
    <meta property="og:site_name" content="@yield('og-site-name', 'BriskBrain')" />
    <meta property="og:image" content="@yield('og-image', asset('images/logo/1707390152.png'))">
    <meta property="og:type" content="@yield('og-type', 'website')" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('og-title', 'BriskBrain')" />
    <meta name="twitter:description" content="@yield('og-description', 'BriskBrain.')" />
    <meta name="twitter:image:src" content="@yield('og-image', asset('images/logo/1707390152.png'))">
    
    <!-- Google SEO Canonical Link -->
    <link rel="canonical" href="{{ trim($__env->yieldContent('canonical')) ?: url()->current() }}" />

    <!-- <link rel="icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/png" />  -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script>
        (function() {
            var link = document.createElement('link');
            link.href = 'https://fonts.bunny.net/css?family=Nunito&display=swap';
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.async = true;
            document.getElementsByTagName('head')[0].appendChild(link);
        })();
    </script>

    <!-- Bootstrap and custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/iconmoon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link href="{{ asset('assets/frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5WG5Q6J');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Analytics (gtag.js) code -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-WZLRWZ535F"></script> -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-WZLRWZ535F');
    </script>
</head>

<body>
    <div id="app">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WG5Q6J" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @include('layouts.inc.frontend-navbar')

        <main class="">
            @yield('content')
        </main>

        @include('layouts.inc.frontend-footer')
    </div>

    <!-- Fixed order -->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.easypiechart.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/popper.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bxslider.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/counterup.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/waypoints.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/isotope.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/custom.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/common.js') }}" defer></script>

    <script>
        let mybutton = document.getElementById("btn-back-to-top");
    </script>
</body>

</html>
