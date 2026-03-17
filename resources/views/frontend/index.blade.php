@extends('layouts.app')

@section('content')
@section('title', $metaTitle)
@section('meta-description', $metaDescription)
@section('meta-keywords', $metaKeywords)

@section('og-locale', $ogLocale ?? 'en_US')
@section('og-type', $ogType ?? 'website')
@section('og-site-name', $ogSiteName ?? 'BriskBrain')
@section('og-url', $ogUrl ?? url()->current())
@section('og-title', $ogTitle ?? $metaTitle)
@section('og-description', $ogDescription ?? $metaDescription)

<style>
    .banner-outer {
        display: block
    }

    .mobile-img-dev {
        display: none
    }

    @media only screen and (max-width:767px) {

        .banner-outer {
            display: none
        }

        .mobile-img-dev {
            display: block
        }

        .mobile-img-dev img {
            max-width: 100%;
            display: block;
            min-height: 180px;
            margin: 0 auto
        }
    }

    .valuable-clients {
        background-color: #f8f9fa;
    }

    .valuable-clients .head-block h2 {
        margin-bottom: 50px;
        color: #333;
        font-weight: 600;
    }

    .clients-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 30px;
        align-items: center;
        justify-items: center;
    }

    .client-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-height: 100px;
        width: 100%;
    }

    .client-logo:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .client-logo img {
        max-width: 120px;
        max-height: 60px;
        object-fit: contain;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .clients-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 992px) {
        .clients-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .clients-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .client-logo {
            padding: 15px;
            min-height: 80px;
        }

        .client-logo img {
            max-width: 100px;
            max-height: 50px;
        }
    }

    @media (max-width: 480px) {
        .clients-grid {
            grid-template-columns: repeat(1, 1fr);
            gap: 15px;
        }
    }
</style>

<section class="banner-outer">
    <div class="banner-slider">
        <div class="banner banner1 slide1">
            <div class="container">
                <div class="row cnt-block">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 mobile-img">
                        <figure class="animated fadeInUp delay-06s"><img
                                src="{{ asset('assets/frontend/img/web_vector.webp') }}" class="img-slide1"
                                alt="web_vector" fetchpriority="high" width="600" height="400"></figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner banner2 slide2">
            <div class="container">
                <div class="row cnt-block">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 mobile-img">
                        <figure class="animated fadeInDown delay-06s"><img
                                src="{{ asset('assets/frontend/img/niche_vecor2.webp') }}" class="img-fluid"
                                alt="niche_vecor2" width="600" height="400"></figure>
                        <figure class="animated fadeInRight delay-06s"><img
                                src="{{ asset('assets/frontend/img/niche_vecor4_1.webp') }}" class="img-slide2-02"
                                alt="niche_vecor4_1" width="300" height="200"></figure>
                        <figure class="animated fadeInUp delay-06s"><img
                                src="{{ asset('assets/frontend/img/niche_vector1.webp') }}" class="img-fluid"
                                alt="niche_vector1" width="600" height="400"></figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner banner3 slide3">
            <div class="container">
                <div class="row cnt-block">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 mobile-img">
                        <figure class="animated fadeInLeft delay-06s"><img
                                src="{{ asset('assets/frontend/img/service_vector.webp') }}" class="img-fluid"
                                alt="service_vector" width="600" height="400"></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="mobile-img-dev">
    <img src="{{ asset('assets/frontend/img/web-development_mobile.webp') }}" alt="Simple Mobile Image" fetchpriority="high" width="600" height="300">
</div>
<section class="content-marketing padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="head-block">
                    <h2>Our Skills</h2>
                </div>
            </div>
        </div>
        <ul class="row marketing-list">
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-lightbulb-o iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>Website Designing</h3>
                    <p>We create a virtual identity for your successful business in the world wide web. With 14 years of
                        experience in creating smart and trendy designs, we provide quality web design at affordable
                        prices.</p>
                </div>
            </li>
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-adjust iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>Web Development</h3>
                    <p>Our team of professionals has considerable experience ranging from simple websites to complex
                        portals. To engage users to your website right from the first halt, we develop a high-impact
                        website design.</p>
                </div>
            </li>
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-mobile-phone iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>Mobile App Developement</h3>
                    <p>We have a proven track record of creating an Android and iOS application for Bluetooth and
                        Bluetooth low energy (BLE) devices. We build a smart application using iBeacon and Eddystone
                        (UID, URI, TLM)</p>
                </div>
            </li>
        </ul>
        <ul class="row marketing-list list-02">
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-user-md iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>Hire Resources</h3>
                    <p>Hire our expertise developer with a ton of experience in their respective domain in PHP
                        technologies like Yii, Laravel, CodeIgniter, Magento, WordPress, Restful Secure APIs development
                        and Third Party APIs development.</p>
                </div>
            </li>
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-support iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>Technical Skills & Expertise</h3>
                    <p>Our skills and expertise help us take up challenging projects and come out with flying colors.
                        Our team is thoroughly versed with modern-day programming languages PHP Frameworks like Yii,
                        CodeIgniter, Laravel and PHP OpenSouce CMS like Magento, WordPress and Open Cart.</p>
                </div>
            </li>
            <li class="col-md-4">
                <div class="inner">
                    <div class="icons">
                        <i class="fa fa-shopping-cart iconskill" aria-hidden="true"></i>
                    </div>
                    <h3>E-Commerce Solution</h3>
                    <p>Avail The Perfect E-commerce Solution For An Increased Conversion Rate. We develop E-commerce
                        Website Design And Development As Per The Latest And Futuristic Trends.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="technologies-section">
    <div class="container">
        <h1 class="main-title">We are BriskBrain Technologies</h1>
        <div class="row">
            <div class="col-lg-6 cnt-block website-technologies">
                <h3 class="service-provider-title">Website and Mobile App Development service provider</h3>
                <p>BriskBrain Technologies is reliably serving worldwide customers for web design and development
                    services with latest technologies, tools and skill set.</p>
                <p>Our aim is to offer the cutting edge consulting and web development services to small businesses and
                    startups which have been available only to medium and large organizations so far.</p>
                <p>If you have a challenging product, application or service to build with a strong focus on quality,
                    expert team and time to market, we can help you realize your vision.</p>
                <a href="#" class="know-more btn-learn-more" aria-label="Learn more about our development services">Learn More</a>
            </div>
            <div class="col-lg-6">
                <figure class="img"><img src="{{ asset('assets/frontend/img/about-briskbraintech-business.webp') }}"
                        class="img-fluid" alt="about-briskbraintech-business" width="600" height="400"></figure>
            </div>
        </div>
    </div>
</section>

<section class="choose-pack padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Core Expertise & Technical Skills</h2>
            </div>
        </div>
        <div class="roundbox">
            <div class="roundbox-part">
                <div class="chart" data-percent="100" data-scale-color="rgb(58, 27, 25)">100%</div>
                <p class="title-development">Laravel Development</p>
            </div>
            <div class="roundbox-part">
                <div class="chart magento" data-percent="98" data-scale-color="rgb(252, 84, 0)">98%</div>
                <p class="title-development">Magento Development</p>
            </div>
            <div class="roundbox-part">
                <div class="chart" data-percent="100" data-scale-color="rgb(58, 27, 25)">100%</div>
                <p class="title-development">Codeigniter Development</p>
            </div>
            <div class="roundbox-part">
                <div class="chart" data-percent="97" data-scale-color="rgb(255, 44, 47)">97%</div>
                <p class="title-development">WordPress Development</p>
            </div>
            <div class="roundbox-part">
                <div class="chart" data-percent="100" data-scale-color="rgb(255, 44, 47)">100%</div>
                <p class="title-development">Custom PHP Development</p>
            </div>
            <div class="roundbox-part">
                <div class="chart" data-percent="96" data-scale-color="rgb(255, 44, 47)">96%</div>
                <p class="title-development">Yii/Yii2 Development</p>
            </div>
        </div>
    </div>
</section>

{{-- Add this section after the counter-section and before @endsection --}}
<section class="valuable-clients padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="head-block text-center">
                    <h2>Valuable Clients</h2>
                </div>
            </div>
        </div>
        <div class="clients-grid">
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/trackie.png') }}" alt="trackie" class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/viscap.png') }}" alt="viscap" class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/nchealthhub.png') }}" alt="nchealthhub"
                    class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/linksupply.png') }}" alt="linksupply"
                    class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/clikwik.png') }}" alt="clikwik" class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/scraperite.png') }}" alt="scraperite"
                    class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/ohtel.png') }}" alt="ohtel" class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/led.png') }}" alt="shopdap" class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/drweiss.png') }}" alt="drwiess"
                    class="img-fluid" width="120" height="60">
            </div>
            <div class="client-logo">
                <img src="{{ asset('assets/frontend/img/clients/logo_black.png') }}" alt="logo_black" class="img-fluid" width="120" height="60">
            </div>
        </div>
    </div>
</section>

<section class="client-speak carousel1 padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
                <h2>What Our Clients Say</h2>
            </div>
        </div>
        <ul class="speak-listing opt1 owl-carousel">
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile.png') }}"
                            class="img-fluid rounded-circle" alt="profile" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Andre Forde</h3>
                        <span class="designation">USA</span>
                    </div>
                    <p>“5 out of 5 stars. Always responsive and professional.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_22073579.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Testunity</h3>
                        <span class="designation">USA</span>
                    </div>
                    <p>“BriskBrain is too good in understanding the requirement. His technical skill is awesome. Want to
                        hire you again.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile.png') }}"
                            class="img-fluid rounded-circle" alt="profile" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Mchibly</h3>
                        <span class="designation">Brazil</span>
                    </div>
                    <p>“briskbrain is a very good professional.. I recommend “</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_26535677.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Vijay Ranganathapura</h3>
                        <span class="designation">India</span>
                    </div>
                    <p>“Nice person. Was up to speed quickly and delivered the results on time.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile.png') }}"
                            class="img-fluid rounded-circle" alt="profile" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Marlon M.</h3>
                        <span class="designation">United States</span>
                    </div>
                    <p>“Great developer and easy to work with. Very fast resolution as well. I recommend this developer
                        and will do other task with him since he is honest to work with!“</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile.png') }}"
                            class="img-fluid rounded-circle" alt="profile" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Hazim N.</h3>
                        <span class="designation">Malaysia</span>
                    </div>
                    <p>“It was pleasant to work with Manish, communications were clear and work was delivered on time.“
                    </p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_15562219.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Leetdave</h3>
                        <span class="designation">Philippines</span>
                    </div>
                    <p>“Very Professional =)”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_24696770.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Acheros</h3>
                        <span class="designation">Germany</span>
                    </div>
                    <p>“A needed someone who was able to do something very specific and he was just the right man to do
                        that.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_19399235.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Boogieyourmind</h3>
                        <span class="designation">Australia</span>
                    </div>
                    <p>“Thanks so much. truely great work. will book you again.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/profile_logo_7214273.jpg') }}"
                            class="img-fluid rounded-circle" alt="profile_logo" width="80" height="80"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Pal Sidhu</h3>
                        <span class="designation">Australia</span>
                    </div>
                    <p>“Initially had confusions understanding our project, but through constant communication and
                        trials he finally got it right, we had to spend a lot of time to make him understand but we are
                        happy with the outcome. Will hire again, when he finally understands it all.”</p>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure><img src="{{ asset('assets/frontend/img/review-.jpeg') }}" style="max-width: 100px;"
                            class="img-fluid rounded-circle" alt="review"></figure>
                    <span class="icon-quote"></span>
                    <div class="client-detail">
                        <h3>Marc S.</h3>
                        <span class="designation">United States</span>
                    </div>
                    <p>“Awesome job, kept cool head with the few bugs that the project developed.
                        Worked clean code, professional look.”</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="portfolio-outer">
    <div class="container text-center">
        <h2 class="main-title">Latest from Our Lovely Work</h2>

        <ul class="clearfix row portfolio isotopeContainer">
            <li class="col-6 col-md-4 isotopeSelector company">
                <div class="inner">
                    <div class="overlay">
                        <h3>Ledtronix</h3>
                        <p>Magento</p>
                        <a class="galleryItem"
                            href="{{ asset('assets/frontend/img/portfoliyo/ledtronix.webp') }}" aria-label="Expand Ledtronix project image"><span
                                class="icon-expand"></span></a>
                        <a href="https://ledtronix.co.za/" target="_blank" aria-label="Visit Ledtronix website"><span class="icon-play-btn"></span></a>
                    </div>
                    <figure><img src="{{ asset('assets/frontend/img/portfoliyo/ledtronix.webp') }}"
                            class="img-responsive" alt="ledtronix" width="400" height="300"></figure>
                </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector wordpress">
                <div class="inner">
                    <div class="overlay">
                        <h3>webcado-kunden</h3>
                        <p>WordPress</p>
                        <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/swiss.webp') }}" aria-label="Expand Swiss project image"><span
                                class="icon-expand"></span></a>
                        <a href="#" target="_blank" aria-label="Visit Swiss project website"><span class="icon-play-btn"></span></a>
                    </div>
                    <figure><img src="{{ asset('assets/frontend/img/portfoliyo/swiss.webp') }}"
                            class="img-responsive" alt="swiss" loading="lazy" width="400" height="300"></figure>
                </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector business">
                <div class="inner">
                    <div class="overlay">
                        <h3>Nchealthhub</h3>
                        <p>Laravel</p>
                        <a class="galleryItem"
                            href="{{ asset('assets/frontend/img/portfoliyo/nclhealth.webp') }}" aria-label="Expand Nchealthhub project image"><span
                                class="icon-expand"></span></a>
                        <a href="https://www.nchealthhub.com/" target="_blank" aria-label="Visit Nchealthhub website"><span
                                class="icon-play-btn"></span></a>
                    </div>
                    <figure><img src="{{ asset('assets/frontend/img/portfoliyo/nclhealth.webp') }}"
                            class="img-responsive" alt="nclhealth" width="400" height="300"></figure>
                </div>
            </li>
        </ul>
        <a href="{{ url('portfolio') }}" class="know-more btn-learn-more" aria-label="View our full portfolio of projects">Full Portfolio</a>
    </div>
</section>
<section class="counter-section">
    <div class="container">
        <h2 class="text-center main-title">Our Work History</h2>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="counter-listing">
                    <li>
                        <div class="iconbox"><i class="fa fa-sticky-note-o noteicon" aria-hidden="true"></i></div>
                        <span class="counter" data-num="70">70</span>
                        <span class="sub-title">Upwork Projects Completed</span>
                    </li>
                    <li>
                        <div class="iconbox"><i class="fa fa-hourglass-o" aria-hidden="true"></i></div>
                        <div class="couter-outer"><span class="counter" data-num="2000">2000</span><span>+</span>
                        </div>
                        <span class="sub-title">Hours Worked on Upwork</span>
                    </li>
                    <li>
                        <div class="iconbox"><i class="fa fa-bar-chart"></i></div>
                        <div class="couter-outer"><span class="counter" data-num="150">150</span><span>+</span></div>
                        <span class="sub-title">Total Projects</span>
                    </li>
                    <li>
                        <div class="iconbox"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                        <div class="couter-outer"><span class="counter" data-num="14">14</span></div>
                        <span class="sub-title">Years Of Experience</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
