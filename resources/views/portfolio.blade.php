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
    <section class="banner-section portfolio-banner">
        <div class="container">
            <div class="contents">
                <h1>Our Portfolio</h1>
            </div>
        </div>
    </section>
    <section class="portfolio-outer padding-lg">
        <div class="container text-center">
            <h2 class="main-title">Portfolio</h2>
            <div class="isotopeFilters">
                <ul class="portfolio-filter clearfix">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".application">CodeIgniter</a></li>
                    <li><a href="#" data-filter=".business">Laravel</a></li>
                    <li><a href="#" data-filter=".company">Magento</a></li>
                    <li><a href="#" data-filter=".software">PHP</a></li>
                    <li><a href="#" data-filter=".webapp">Web Design</a></li>
                    <li><a href="#" data-filter=".wordpress">WordPress</a></li>
                    <li><a href="#" data-filter=".yiitwo">Yii/Yii2</a></li>
                    <li><a href="#" data-filter=".Shopify">Shopify</a></li>
                    <li><a href="#" data-filter=".python">Python</a></li>
                </ul>
            </div>
            <ul class="row portfolio clearfix isotopeContainer">
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Khello</h2>
                            <p>Laravel</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/khello.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://khello.com.au/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/khello.webp') }}"
                                class="img-responsive" alt="khello"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Celergen Swiss</h2>
                            <p>Laravel</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/celergen.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://celergenswiss.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/celergen.webp') }}"
                                class="img-responsive" alt="celergen"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Swiss Caviarlieri</h2>
                            <p>Laravel</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/caviarlieri.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="http://51.21.188.137/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/caviarlieri.webp') }}"
                                class="img-responsive" alt="caviarlieri"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Klotho</h2>
                            <p>Laravel</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/klotho.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="http://13.61.248.76/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/klotho.webp') }}"
                                class="img-responsive" alt="klotho"></figure>
                    </div>
                </li>
                 <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Viscap</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/viscap.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.viscap-cs.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/viscap.webp') }}"
                                class="img-responsive" alt="viscap"></figure>
                    </div>
                </li>
                 <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Digialch</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/digialch.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://digialch.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/digialch.webp') }}"
                                class="img-responsive" alt="digialch"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>G4gift</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/g4gift.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://g4gift.in/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/g4gift.webp') }}"
                                class="img-responsive" alt="g4gift"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Princetoncryo</h2>
                            <p>Magento</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/PrincetonCryo.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://princetoncryo.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/PrincetonCryo.webp') }}"
                                class="img-responsive" alt="PrincetonCryo"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector Shopify">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Ledtronix</h2>
                            <p>Shopify</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/ledtronixx.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://ledtronix.co.za/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/ledtronixx.webp') }}"
                                class="img-responsive" alt="ledtronix"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Shopdap</h2>
                            <p>Magento</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/shopdap.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.shopdap.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/shopdap.webp') }}"
                                class="img-responsive" alt="shopdap"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector yiitwo">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Trackie</h2>
                            <p>Yii/Yii2</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Trackie.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://futuera.mytrackie.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Trackie.webp') }}"
                                class="img-responsive" alt="Trackie"></figure>
                    </div>
                </li>

                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>webcado-kunden</h2>
                            <p>WordPress</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/swiss.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="#" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/swiss.webp') }}"
                                class="img-responsive" alt="swiss"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Linksupply</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/linksupply.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://linksupply.ie/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/linksupply.webp') }}"
                                class="img-responsive" alt="linksupply"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Maximumpaidsurveys</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Maximumpaidsurveys.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://maximumpaidsurveys.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Maximumpaidsurveys.webp') }}"
                                class="img-responsive" alt="Maximumpaidsurveys"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Fanous</h2>
                            <p>Magento</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/Fanous.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://fanous.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Fanous.webp') }}"
                                class="img-responsive" alt="Fanous"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector software">
                    <div class="inner">
                        <div class="overlay">
                            <h2>ScanUrl</h2>
                            <p>PHP</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/ScanURL.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://scanurl.net/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/ScanURL.webp') }}"
                                class="img-responsive" alt="ScanURL"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Clickwik</h2>
                            <p>Laravel</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/clickwik.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://clickwik.in/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/clickwik.webp') }}"
                                class="img-responsive" alt="clickwik"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Nchealthhub</h2>
                            <p>Laravel</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/nclhealth.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.nchealthhub.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/nclhealth.webp') }}"
                                class="img-responsive" alt="nclhealth"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector yiitwo">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Crowdreviews</h2>
                            <p>Yii/Yii2</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Crowdreviews.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.crowdreviews.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Crowdreviews.webp') }}"
                                class="img-responsive" alt="Crowdreviews"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector application">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Fornebu Pizza</h2>
                            <p>CodeIgniter</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/fornebu-pizza.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://fornebu.pizza/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/fornebu-pizza.webp') }}"
                                class="img-responsive" alt="fornebu-pizza"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector application">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Vocalegalglobal</h2>
                            <p>CodeIgniter</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Vocalegalglobal.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.vocalegalglobal.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Vocalegalglobal.webp') }}"
                                class="img-responsive" alt="Vocalegalglobal"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector  Shopify">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Niceg</h2>
                            <p>Shopify</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/Niceg.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.niceg.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Niceg.webp') }}"
                                class="img-responsive" alt="Niceg"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector application company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Plasticblades and scraperite</h2>
                            <p>CodeIgniter / Magento</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/plasticblades.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://resellers.scraperite.com/plasticblades/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/plasticblades.webp') }}"
                                class="img-responsive" alt="plasticblades"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Royalwholesalecandy</h2>
                            <p>Magento</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/royalwholesalecandy.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://royalwholesalecandy.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/royalwholesalecandy.webp') }}"
                                class="img-responsive" alt="royalwholesalecandy"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector company">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Snaggletoothstudio</h2>
                            <p>Magento</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Snaggletoothstudio.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://snaggletoothstudios.com/" target="_blank"><span
                                    class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Snaggletoothstudio.webp') }}"
                                class="img-responsive" alt="Snaggletoothstudio"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Eaprincipals</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Eaprincipals.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://eaprincipals.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Eaprincipals.webp') }}"
                                class="img-responsive" alt="Eaprincipals"></figure>
                    </div>
                </li>

                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Custom Plugin Frontend</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/cutom_plugin_frontend.webp  ') }}"><span
                                    class="icon-expand"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/cutom_plugin_frontend.webp') }}"
                                class="img-responsive" alt="cutom_plugin_frontend"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Asset Tracking Management</h2>
                            <p>Laravel</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/Assets-Management.webp') }}"><span
                                    class="icon-expand"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Assets-Management.webp') }}"
                                class="img-responsive" alt="Assets-Management"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Custom Plugin Backend</h2>
                            <p>WordPress</p>
                            <a class="galleryItem"
                                href="{{ asset('assets/frontend/img/portfoliyo/cutom_plugin_backend.webp') }}"><span
                                    class="icon-expand"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/cutom_plugin_backend.webp') }}"
                                class="img-responsive" alt="cutom_plugin_backend"></figure>
                    </div>
                </li>

                <li class="col-6 col-md-4 isotopeSelector webapp Shopify">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Vissco</h2>
                            <p>Shopify</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/vissco.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.vissconext.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/vissco.webp') }}"
                                class="img-responsive" alt="vissco"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector wordpress">
                    <div class="inner">
                        <div class="overlay">
                            <h2>DrWeiss</h2>
                            <p>WordPress</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/weiss.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.drweiss.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/weiss.webp') }}"
                                class="img-responsive" alt="weiss"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector python">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Ohtel</h2>
                            <p>Python</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/ohtel.png') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.ohtel.in/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/ohtel.png') }}" class="img-responsive"
                                alt="clickwik.webp"></figure>
                    </div>
                </li>
                <li class="col-6 col-md-4 isotopeSelector python">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Newhom</h2>
                            <p>Python</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/newhome.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://www.newhom.com.au/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/newhome.webp') }}" class="img-responsive"
                                alt="clickwik.webp"></figure>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
