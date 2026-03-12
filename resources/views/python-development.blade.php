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
    <section class="banner-section python-banner">
        <div class="container">
            <div class="contents">
                <h1>Python Development </h1>
            </div>
        </div>
    </section>
    <section class="career-our-values-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Python Development Services</h3>
                    <p>Python development services encompass a wide range of offerings tailored to various needs, from web
                        development to data analysis, machine learning, automation and more. We are
                        providing below Python development services.</p><br>
                    <p><b>Web Development:</b> Building web applications using Python frameworks like Flask, Django, or
                        FastAPI.
                        These frameworks provide tools and libraries for developing scalable, secure, and feature-rich web
                        applications.</p><br>
                    <p><b>Data Analysis and Visualization:</b> Leveraging Python libraries such as Pandas, NumPy,
                        Matplotlib, and
                        Seaborn to analyze data, derive insights, and create visualizations for reporting and
                        decision-making.</p><br>
                    <p><b>Machine Learning and AI:</b> Developing machine learning models and AI applications using
                        libraries like
                        TensorFlow, PyTorch, scikit-learn, and Keras. Python's simplicity and extensive libraries make it a
                        popular choice for building and deploying ML and AI solutions.</p><br>
                    <p><b>Automation and Scripting:</b> Writing scripts and automation tools to streamline repetitive tasks,
                        automate workflows, and improve productivity. Python's simplicity, readability, and cross-platform
                        compatibility make it ideal for automation purposes.</p><br>
                    <p><b>Custom Software Development:</b> Building custom software solutions tailored to specific business
                        needs,
                        including CRM systems, ERP systems, inventory management systems, and more, using Python and
                        relevant frameworks.
                    </p><br>
                    <p><b>API Development:</b> Creating RESTful or GraphQL APIs using Python frameworks like Flask, Django
                        REST
                        Framework, or FastAPI. APIs enable communication between different software systems and facilitate
                        data exchange.</p><br>
                    <p><b>DevOps and Cloud Infrastructure:</b> Using Python to automate infrastructure provisioning,
                        deployment,
                        monitoring, and management tasks in DevOps workflows. Python libraries like Fabric, Ansible, and
                        Boto3 are commonly used for this purpose.</p><br>
                    <p><b>Testing and Quality Assurance:</b> Writing test scripts and performing automated testing using
                        Python
                        testing frameworks such as pytest, unittest, and behave to ensure the quality and reliability of
                        software applications.</p><br>
                    <p><b>Consulting and Training: </b>Providing consulting services and training sessions on Python best
                        practices, architecture design, code reviews, performance optimization, and more to improve
                        development processes and outcomes.</p><br>
                    <p><b>Maintenance and Support:</b> Offering ongoing maintenance, support, and optimization services for
                        existing Python applications, including bug fixes, performance tuning, security updates, and feature
                        enhancements.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-outer padding-lg">
        <div class="container text-center">
            <h2 class="main-title">Related Portfilio</h2>
            <ul class="row portfolio clearfix isotopeContainer">
                <li class="col-6 col-md-4 isotopeSelector business">
                    <div class="inner">
                        <div class="overlay">
                            <h2>Ohtel</h2>
                            <p>Python</p>
                            <a class="galleryItem" href="{{ asset('assets/frontend/img/portfoliyo/Ohtel.webp') }}"><span
                                    class="icon-expand"></span></a>
                            <a href="https://ohtelglobal.com/" target="_blank"><span class="icon-play-btn"></span></a>
                        </div>
                        <figure><img src="{{ asset('assets/frontend/img/portfoliyo/Ohtel.webp') }}" class="img-responsive"
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
