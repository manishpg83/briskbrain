@extends('layouts.app')
@section('title', $title)
@section('meta-title', $metaTitle)
@section('meta-description', $metaDescription)
@section('meta-keywords', $metaKeywords)

@section('og-locale', $ogLocale ?? 'en_US')
@section('og-type', $ogType ?? 'website')
@section('og-site-name', $ogSiteName ?? 'BriskBrain')
@section('og-url', $ogUrl ?? url()->current())
@section('og-title', $ogTitle ?? $metaTitle)
@section('og-description', $ogDescription ?? $metaDescription)

@section('content')
<section class="banner-section magento-banner">
    <div class="container">
        <div class="contents">
            <h1>Magento Ecommerce Development</h1>
        </div>
    </div>
</section>        
<section class="career-our-values-sec pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Magento Development Company</h3>
                <p>BriskBrain is the best Magento Development Company India having expert Magento developers and designers. As a Magento Development service provider, we are expert in website design and e-commerce website development. We are the top rated company for Magento Development in India. Magento is an opensource eCommerce CMS for developing e-commerce websites. Magento is the most advanced eCommerce CMS platforms. We have a proven track record in delivering successful Magento Web solutions. We are having our development center in USA, UK, UAE, Netherland and Germany. Web Development India being the best Magento Development Company in India go the extra mile to understand your business requirements and give you the best solution. We have been working with Magento Platform for various small, medium or large projects/website. We are compatible to work full time, part time, hourly rate and even on a fixed cost project basis. We are very experienced to develop e-commerce website based on Magento Platform.</p>
            </div>
        </div>
    </div>
</section>
<section class="career-our-values-sec pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Magento Development Company India</h3>
                <ul class="our-values">
                    <li>Magento Website Development</li>
                    <li>Magento 2.0 Development</li>
                    <li>E-commerce Website Development</li>
                    <li>Magento Upgrade to 2.0</li>
                    <li>Magento Extension Development</li>
                    <li>PSD To Magento Development</li>
                    <li>Magento E-commerce Website Speed Optimization</li>
                </ul>
            </div>                    
        </div>                
    </div>
</section>
<section class="portfolio-outer padding-lg"> 
    <div class="container text-center">
        <h2 class="main-title">Related Portfilio</h2>
        <ul class="row portfolio clearfix isotopeContainer">
            <li class="col-6 col-md-4 isotopeSelector company">
            <div class="inner">
                            <div class="overlay">
                                <h2>Royalwholesalecandy</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/royalwholesalecandy.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://royalwholesalecandy.com/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/royalwholesalecandy.webp') }}" class="img-responsive" alt="royalwholesalecandy"></figure>
                        </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector company webapp">
            <div class="inner">
                            <div class="overlay">
                                <h2>Shopdap</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/shopdap.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://www.shopdap.com/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/shopdap.webp') }}" class="img-responsive" alt="shopdap"></figure>
                        </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector company">
            <div class="inner">
                            <div class="overlay">
                                <h2>Snaggletoothstudio</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/Snaggletoothstudio.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://snaggletoothstudios.com/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Snaggletoothstudio.webp') }}" class="img-responsive" alt="Snaggletoothstudio"></figure>
                        </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector company webapp">
            <div class="inner">
                            <div class="overlay">
                                <h2>Plasticblades and scraperite</h2>
                                <p>CodeIgniter / Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/plasticblades.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://resellers.scraperite.com/plasticblades/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/plasticblades.webp') }}" class="img-responsive" alt="plasticblades"></figure>
                        </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector company webapp">
            <div class="inner">
                            <div class="overlay">
                                <h2>Princetoncryo</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/PrincetonCryo.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://princetoncryo.com/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/PrincetonCryo.webp') }}" class="img-responsive" alt="PrincetonCryo"></figure>
                        </div>
            </li>
            
            <li class="col-6 col-md-4 isotopeSelector company webapp">
            <div class="inner">
                            <div class="overlay">
                                <h2>Fanous</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/Fanous.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://fanous.com/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Fanous.webp') }}" class="img-responsive" alt="Fanous"></figure>
                        </div>
            </li>
            <li class="col-6 col-md-4 isotopeSelector company">
                        <div class="inner">
                            <div class="overlay">
                                <h2>Ledtronix</h2>
                                <p>Magento</p>
                                <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/ledtronix.webp') }}"><span class="icon-expand"></span></a>
                                <a  href="https://ledtronix.co.za/" target="_blank"><span class="icon-play-btn"></span></a>
                            </div>
                            <figure><img src="{{ asset('assets/frontend/img/portfoliyo/ledtronix.webp') }}" class="img-responsive" alt="ledtronix"></figure>
                        </div>
                    </li>
        </ul>
    </div>
</section>

@endsection